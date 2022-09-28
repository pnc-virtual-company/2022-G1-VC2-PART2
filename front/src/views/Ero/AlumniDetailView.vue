<template>
<div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full">
  <div class="bg-white w-[60%] m-auto mt-6 p-2 rounded pb-4 " v-click-outside="onClickOutside">
    <div class="flex justify-end p-2 mr-[1rem]">
      <svg class="w-8 h-8 py-1 hover:cursor-pointer shadow hover:bg-gray-200 text-gray-900 rounded-full" @click="$emit('close')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
    </div>
    <div class="px-2 h-[80vh] overflow-auto">
      <div class="">
        <div class="relative">
        <div class="w-full h-36">
          <img
            class="w-full h-36 border-[1px] border-gray-300 object-cover object-center"
            :src="'http://127.0.0.1:8000/images/cover/'+ alumni['coverimage']"
            alt=""
          />
        </div>
        <div class="absolute mt-[-7rem] text-center w-full">
          <div class="h-32 rounded-full w-full flex justify-center">
            <img
              class="w-32 h-32 rounded-full border-blue-400 border-[1px] object-cover"
              :src="'http://127.0.0.1:8000/images/profile/'+ alumni['profile']"
              alt=""
            />
          </div>
          <h1 class="font-bold text-xl text-center">{{alumni['first_name'] + ' ' + alumni['last_name']}}</h1>
        </div>
      </div>
    </div>

    <div class="w-full mt-20">
      <card-info :user="alumni" :role="role"></card-info>
      <card-skill 
      :alu_id="alumni['id']" 
      :role="role"></card-skill>
      <card-edu :edu="edu" :role="role" class="mt-[1.5rem]"></card-edu>
      <card-exper :experiences="experiences" :role="role" class="mt-[1.5rem]"></card-exper>
    </div>
    </div>
  </div>
</div>

</template>

<script>
import CardSkills from "../Alumni/skills/CardSkills.vue";
import EduCard from "../Alumni/CardView/EduCard.vue";
import CardExper from "../Alumni/CardView/CardExper.vue";
import CardInfo from "../Alumni/CardView/CardInfo.vue";
import axios from '../../axios-http'
export default {
  components: {
    "card-skill": CardSkills,
    "card-edu": EduCard,
    "card-exper": CardExper,
    "card-info": CardInfo,
  },
  props:['alumni'],
  computed: {
    getGender() {
      console.log('alumni_Id: ', this.alumni['id'])
      if(this.alumni['gender'] == 'F') {
        return 'Female';
      }else if (this.alumni['gender'] == 'M'){
        return 'Male';
      }else if (this.alumni['gender'] == 'Other') {
        return 'Other';
      }
    }
  },
  data() {
    return {
      edu: [],
      experiences: [],
      role: 'ero'
    };
  },
  methods: {
    getAlumniEdu() {
      axios.get("alumniEdu/"+this.alumni['id']).then((res) => {
        this.edu = res.data;
      });
    },
    onClickOutside(){this.$emit('close')},
    getAlumniExperiences() {
      axios.get("workexperience/"+this.alumni['id']).then((res) => {
        this.experiences = res.data;
      });
    },
  },

  mounted() {
    this.getAlumniEdu();
    this.getAlumniExperiences();
  },
};
</script>

<style></style>
