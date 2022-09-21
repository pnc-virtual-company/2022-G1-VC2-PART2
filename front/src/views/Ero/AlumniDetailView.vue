<template>
    <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full" >
        <div class="bg-white w-[60%] m-auto mt-6 p-2 rounded pb-4 ">
            <div class="flex justify-end">
              <svg @click="$emit('close')"
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
            <div class="px-2 h-[33rem] overflow-auto">
              <div class="">
                <div class="relative">
                  <div class="w-full h-36">
                    <img
                      class="w-full h-36 border-[1px] border-gray-300 object-cover object-center"
                      src="../../assets/download.jpg"
                      alt=""
                    />
                  </div>
                  <div class="absolute mt-[-7rem] text-center w-full">
                    <div class="h-32 rounded-full w-full flex justify-center">
                      <img
                        class="w-32 h-32 rounded-full border-blue-400 border-[1px] object-cover"
                        src="../../assets/cutes.jpg"
                        alt=""
                      />
                    </div>
                    <h1 class="font-bold text-xl text-center">Sreymao Vorn</h1>
                  </div>
                </div>
              </div>
        
              <div
                class="mt-12 flex justify-between">
                <div class="general-information w-[36%]">
                  <div>
                    <h2 class="font-bold text-lg">General Information</h2>
                    <div class="flex mt-2">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 "
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"
                        />
                      </svg>
                      <span class="ml-3 text-md ">2022</span>
                    </div>
                    <div class="flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
                        />
                      </svg>
                      <span class="ml-3 text-md ">WEB</span>
                    </div>
                    <div class="flex items-center">
                      <img src="../../assets/gender.png" class="w-4 h-4" alt="" />
                      <span class="ml-3 text-md">Female</span>
                    </div>
                    <div class="flex">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-5"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
                        />
                      </svg>
                      <span class="ml-3 text-md">088 212 4332</span>
                    </div>
                    <div class="flex">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                        />
                      </svg>
                      <span class="ml-2 text-md">sreymao.vorn2004@gmail.com</span>
                    </div>
                  </div>
                  <card-skill alu_id="1" :role="role" class="mt-2"></card-skill>
                </div>
        
                <div class="w-[60%] mt-2 ">
                  <card-edu :edu="edu" :role="role"></card-edu>
                  <card-exper :experiences="experiences" :role="role" class="mt-2"></card-exper>
                </div>
              </div>

            </div>
        </div>
    </div>

</template>

<script>
import CardSkills from "../Alumni/skills/CardSkills.vue";
import EduCard from "../Alumni/CardView/EduCard.vue";
import CardExper from "../Alumni/CardView/CardExper.vue";
import axios from '../../axios-http'
export default {
  components: {
    "card-skill": CardSkills,
    "card-edu": EduCard,
    "card-exper": CardExper,
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
      axios.get("alumniEdu/1").then((res) => {
        this.edu = res.data;
      });
    },
    getAlumniExperiences() {
      axios.get("workexperience/1").then((res) => {
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
