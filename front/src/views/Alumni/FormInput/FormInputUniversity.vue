<template>
  <div class="relative" v-click-outside="clickedOutside">
    <input
      v-model="searchTerm"
      @input="handleInput"
      placeholder="Enter text here."
      tabindex="0"
      class=" mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]"
    />
    <span
      v-if="searchTerm"
      @click.prevent="reset()"
      class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer"
    >
      x
    </span>
    <div
      v-if="searchResults.length"
      v-show="searchTerm && showOptions"
      @focusout="showOptions = false"
      tabindex="0"
      class="absolute w-full z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md"
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
    };
  },

  computed: {
    searchResults() {
      let matches = 0;
      return this.universities.filter((university) => {
        if (
          university.name.toLowerCase().includes(this.searchTerm.toLowerCase()) &&
          matches < 10
        ) {
          matches++;
          return university;
        }
      });
    },
  },
  methods: {
    reset() {
      this.showOptions = false;
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
      this.showOptions = false;
    },
    clickedOutside() {
      this.showOptions = false;
    },
  },
};
</script>
