<template>
  <div class="autocomplete w-[100%] relative m-auto">
    <div class="flex justify-between items-center border" v-if="!visible">   
        <div @click="toggleVisible" class="input w-[100%] cursor-text p-2 bg-gray-50" v-text="selectedItem? selectedItem['name'] : message"></div>
    </div>
    <div class="popover border min-h-8 w-full" v-else>
      <input type="text"
      class="outline-none w-[100%] p-2 border bg-gray-50"
        ref="input"
        v-model="query"
        @keydown.enter="selectItem"
        placeholder="Find here..."
      >
      <div class="options" ref="optionsList">
        <ul class="overflow-y-scroll bg-gray-100 max-h-24 absolute w-full my-auto" v-if="matches.length">
          <li 
            class="rounded-ms p-1 hover:bg-gray-300"
            v-for="(match, index) in matches"
            :key="index"
            @click="itemClicked(index)"
            :class="(0 == index)?'border-l-2 font-bold border-blue-400':''"
            >{{match['name']}}</li>
        </ul>
        <div class="m-auto p-2" v-if="!matches.length&&query!=''">
          <slot></slot>  
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props:['items', 'error', 'message'],
    data() {
      return {
        itemHeight: 39,
        selectedItem: null,
        query: '',
        visible: false
      };
    },
    methods: {
      toggleVisible() {
        this.visible = !this.visible;
        setTimeout(() => {
          this.$refs.input.focus();
        }, 50);
      },
      itemClicked(index) {
        this.selected = index;
        this.selectItem();
      },
      selectItem() {
        if (!this.matches.length) {
          return;
        }
        this.selectedItem = this.matches[this.selected];
        this.visible = false;
        this.$emit('selected', this.selectedItem);
      },
     
      scrollToItem() {
        this.$refs.optionsList.scrollTop = this.selected * this.itemHeight;
      }
    },
    computed: {
      matches() {
        this.$emit('change', this.query);
        if (this.query == '') {
          return [];
        }
        return this.items.filter((item) => item['name'].toLowerCase().includes(this.query.toLowerCase()))
      }
    }
  }
</script>
