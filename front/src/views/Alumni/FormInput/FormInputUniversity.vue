<template>
  <div class="relative" v-click-outside="clickedOutside">
    <input
      v-model="searchTerm"
      @input="handleInput"
      @focus="showOptions = true"
      placeholder="name"
      class=" mt-2 block p-2 w-full  outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:border-[#22bbea] placeholder:text-gray-500"
    />
    <!-- <svg v-if="searchTerm ==''" class="absolute w-7 h-7 font-bold	 inset-y-0 right-0 pr-3 flex items-center cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
    </svg> -->
    <img v-if="showOptions && !isSelected" @click="showOptions = false"  class="absolute w-[15xpx] h-[10px] mt-3 inset-y-0 right-0 pr-[5px] flex items-center cursor-pointer"  src="../../../assets/up-arrow.png" alt="">
    <img v-if="!showOptions && !isSelected" @click="showOptions = true" class="absolute w-[15px] h-[10px] mt-3 inset-y-0 right-0 pr-[5px] flex items-center cursor-pointer"  src="../../../assets/down-arrow.png" alt="">

    <span
      v-if="isSelected"
      @click.prevent="reset()"
      class="absolute inset-y-0 right-0 pr-[7px] flex items-center cursor-pointer font-medium"
    >
      x
    </span>
    <div
      v-show="showOptions && searchResults.length"
      @focusout="showOptions = false"
      tabindex="0"
      class="absolute w-full h-[auto] max-h-64 z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md"
    >
      <ul class="py-1" >
        <li
          v-for="(university, index) in searchResults"
          :key="index"
          @click="handleClick(university)"
          class="px-3 py-2 cursor-pointer hover:bg-gray-200"
        >
          {{ university.name }}
        </li>

        <!-- <li v-if="!searchResults.length" class="px-3 py-2 text-center">
          No Matching Results
        </li> -->
      </ul>
    </div>
  </div>
</template>

<script>
export default {

  emits: ["university-id",'university-name'],
  props: ["universities"],
  data() {
    return {
      showOptions: false,
      searchTerm: "",
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
