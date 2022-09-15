<template>
  <div
    tabindex="-1"
    class="bg-[#000000b9] fixed flex items-center z-50 md:inset-0 h-modal md:h-full"
  >
    <div
      class="modal bg-white h-auto shadow-md rounded mt-2 mb-10 m-auto w-[40%] z-10"
    >
      <form @submit.prevent="addSkill" class="bg-white rounded p-5 m-auto text-center w-11/12">
        <div
          class="flex items-center justify-between mt-5 mb-1 text-lg border-b-[1px] border-[black]"
        >
          <p class="font-semibold text-3xl mb-3">Add skills</p>
          <div >
              <svg
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
        </div>
        <div class="w-[100%] m-1 relative flex justify-between mt-10">
          <label class="block text-black-700 text-[20px]">Skills: </label>
          <select
            class="block w-full bg-white px-4 pr-8 rounded outline-none ml-10 text-[20px] border-b-[1px] border-[black]"
            v-model="skill_id"
          >
            <option value="0" disabled>select your skill</option>
            <option v-for:="skill in skills" :value="skill.id">{{skill.name}}</option>
           
          </select>
        </div>
        <div class="w-[100%] p-2 flex justify-end mt-10">
          <button
            type="text"
            class="btn bg-[#ff9100] rounded p-1 text-white w-[25%]"
            @click="$emit('closePopUp', false)"
          >
            cancel
          </button>
          <button
            type="submit"
            class="btn bg-[#22bbea] rounded p-1 text-white w-[25%] ml-3"
          >
            add
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props:['skills'],
  data(){
    return {
      skill_id:0
    }
  },
  methods:{
    addSkill(){
      if(this.skill_id != 0){
        this.$emit('add-skill', {skill_id:this.skill_id, alumni_id:1})
        this.$emit('closePopUp', false)
      }
    }
  }
};
</script>

<style></style>
