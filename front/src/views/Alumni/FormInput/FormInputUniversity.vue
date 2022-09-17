<template>
  <div class="relative" v-click-outside="clickedOutside">
    <input
      v-model="searchTerm"
      @input="handleInput"
      @focus="showOptions = true"
      placeholder="name"
      class=" mt-2 block p-2 w-full  outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:border-[#22bbea] placeholder:text-gray-500"
    />
    <img v-if="showOptions && !isSelected" @click="showOptions = false"  class="absolute w-[15xpx] h-[10px] mt-3 inset-y-0 right-0 pr-[5px] flex items-center cursor-pointer"  src="../../../assets/up-arrow.png" alt="">
    <img v-if="!showOptions && !isSelected" @click="showOptions = true" class="absolute w-[15px] h-[10px] mt-3 inset-y-0 right-0 pr-[5px] flex items-center cursor-pointer"  src="../../../assets/down-arrow.png" alt="">

    <span
      v-if="isSelected"
      @click.prevent="reset()"
      class="absolute inset-y-0 right-0 pr-[7px] flex items-center cursor-pointer font-medium mb-1" 
    >
      x
    </span>
    <div
      v-if="showOptions && searchResults.length"
      @focusout="showOptions = false"
      tabindex="0"
      class="absolute w-full h-[auto] max-h-64 z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md"
    >
      <ul  class="py-1"  >
        <li
          v-for="(university, index) in searchResults"
          :key="index"
          @click="handleClick(university)"
          class="px-3 py-2 cursor-pointer hover:bg-gray-200"
        >
          {{ university.name }}
        </li>

      </ul>
    </div>
    <div
      v-if="searchResults.length == 0 && showOptions"
      @focusout="showOptions = false"
      tabindex="0"
      class="absolute w-full h-[auto] max-h-64 z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md"
    >
      <ul class="py-1 ">
          <li class="px-3 py-2">
            No Matching University
          </li>
          <li class="px-3 py-2">
            <button @click="$emit('is-add-univer')" class="bg-skyblue hover:bg-[#23afda] text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
              <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-skyblue" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
              </svg> -->
                    Add+
            </button>
          </li>
        </ul>
    </div>
  </div>
</template>

<script>
export default {

  emits: ["university-id",'university-name','is-add-univer'],
  props: ["universities"],
  data() {
    return {
      showOptions: false,
      searchTerm: '',
      isSelected: false,
    };
  },

  computed: {
    searchResults() {
      let matches = 0;
      if(this.showOptions && this.searchTerm == "") {
        return this.universities.slice(0,10).sort((a, b) => a.name.toLowerCase().localeCompare(b.name.toLowerCase()))
      }else{
        return this.universities.filter((university) => {
        if (
          university.name.toLowerCase().includes(this.searchTerm.toLowerCase()) &&
          matches < 10
        ) {
          matches++;
          return university;
        }
        });
      }
     
    },
  },
  methods: {
    reset() {
      this.showOptions = false;
      this.isSelected = false;
      this.searchTerm = "";
    },

    handleInput(evt) {
      this.searchTerm = evt.target.value;
      this.showOptions = true;
      this.$emit("university-name", this.searchTerm);
    },
    handleClick(university) {
      this.searchTerm = university.name;
      this.$emit("university-id", university.id);
      this.$emit("university-name", this.searchTerm);
      this.showOptions = false;
      this.isSelected = true;
    },
    clickedOutside() {
      this.showOptions = false;
    },
  },
};
</script>
