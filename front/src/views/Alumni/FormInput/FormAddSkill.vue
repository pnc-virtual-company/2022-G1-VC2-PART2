<template>
  <div
    tabindex="-1"
    class="bg-[#000000b9] fixed flex items-center z-50 md:inset-0 h-modal md:h-full">
    <div
      class="modal bg-white h-auto shadow-md rounded mt-2 mb-10 m-auto w-[30rem] z-10"
      v-click-outside="clickedOutside"
    >
      <form @submit.prevent="addSkill" class="bg-white rounded m-auto">
        <div
          class="flex items-center justify-between text-lg bg-[#23afda] p-2 rounded-tr rounded-tl"
        >
          <p></p>
          <p class="font-semibold">Add skills</p>
          <svg
            @click="$emit('closePopUp', false)"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </div>

        <div class="w-full flex justify-start relative mt-4">
          <addSkill 
          class="w-[94%]"
          :items="skills"
          @selected="selectSkill"
          :message="'Type here'"
          >
          </addSkill>
        </div>
        <div class="w-[100%] p-2 flex justify-end mt-12">
          <button
            type="text"
            class="hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline"
            @click="$emit('closePopUp', false)"
          >
            cancel
          </button>
          <button
            type="submit"
            class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline"
          >
            Add
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import skills from "../../../stores/skills.json"
import addSkill from "./AutoComplete.vue"
export default {
  components: { addSkill },
  data() {
    return {
      skill: null,
    };
  },
  methods: {
    selectSkill(skill) {
      this.skill = skill["name"];
    },
    addSkill() {
      if (this.skill != null) {
        this.$emit("add-skill", { name: this.skill, alumni_id: 1 });
        this.$emit("closePopUp", false);
      }
    },
    clickedOutside() {
      this.$emit("closePopUp", false);
    },
  },

  computed: {
    skills() {
      return skills;
    },
  },
};
</script>
