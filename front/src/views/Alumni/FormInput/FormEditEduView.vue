<template>
<div  v-if="!isAddUniver"  tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full">
    <div class="modal bg-white h-auto shadow-md rounded mt-2 mb-10 m-auto w-[40%] z-10">
        <div class="w-full bg-skyblue p-2">
            <h4 class="font-bold text-center text-white text-[20px]">Edit Education</h4>
        </div>
        <div class="p-5">
            <div class="w-[100%] my-2 p-2">
                <label class="w-[12rem] w-[12rem] text-start text-sm font-medium">University </label>
                <input-edit-univer :universities="universities" :universityName="universityName" @university-name="getUniversityName" @university-id="getUniversitID" @is-add-univer="isAddUniver = true"></input-edit-univer>
            </div>
            <div class="w-[100%] my-2 p-2">
                    <label class="w-[12rem] text-start text-sm font-medium">Major </label>
                    <input v-if="!isPNC && universityName !='Passerelles numériques Cambodia'" type="text" v-model="major" placeholder="name" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]">
                    <select v-else v-model="major" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]">
                        <option selected disabled class="text-gray-900" value="">Choose major</option>
                        <option :value="'WEB'">WEB</option>
                        <option :value="'SNA'">SNA</option>
                    </select>
            </div>
            <div class="w-[100%] my-2 p-2">
                <label class="w-[12rem] w-[12rem] text-start text-sm font-medium">Degree </label>
                <select v-model="degree" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]">
                    <option selected disabled class="text-gray-900" value="">Choose degree</option>
                    <option v-for:="deg in degrees" :value='deg'>{{deg}}</option>
                </select>
            </div>
            
            <div class="date flex justify-between my-2 p-0">
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] w-[12rem] text-start text-sm font-medium">Start date </label>
                    <select v-model="start_month" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]">
                        <option selected disabled value="">Month</option>
                        <option v-for:="month in months" :value="month">{{month}}</option>
                    </select>
                </div>
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] w-[12rem] text-start text-sm font-medium text-white">S</label>
                    <select v-model="start_year" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]">
                        <option selected disabled value="">Year</option>
                        <option v-for:="(year, i) in 16" :value="2022-i">{{2022-i}}</option>
                    </select>
                </div>
            </div>
            <div class="date flex justify-between my-2 p-0">
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] w-[12rem] text-start text-sm font-medium">End Date (or expected) </label>
                    <select v-model="end_month" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]" >
                        <option selected disabled value="">Month</option>
                        <option v-for:="month in months" :value="month">{{month}}</option>
                    </select>
                </div>
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] w-[12rem] text-start text-sm font-medium text-white">S</label>
                    <select v-model="end_year" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]"  >
                        <option selected disabled value="">Year</option>
                        <option v-for:="(year, i) in 16" :value="2022-i">{{2022-i}}</option>
                    </select>
                </div>
            </div>
            <div class="btn-controller flex justify-end">
                <button @click="$emit('cancelEdit')" class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline"> 
                    Cancel
                </button>
                <button @click="editEductaion()" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<div v-else>
    <form-add-univer @is-added-univer="isAddedUniver" @cancelAddUniver="isAddUniver = false"></form-add-univer>
</div>
</template>
<script>
import FormInputEditUniverVue from './FormInputEditUniver.vue';
import FormAddUniver from './FormAddUniver.vue';
export default {
    components:{
        'input-edit-univer': FormInputEditUniverVue,
        'form-add-univer': FormAddUniver,
    },
    emits: ['cancelEdit','EditEdu','added-new-univer'],
  props: ["universities",'education'],
  data() {
    return {
        months: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ],
      degrees: ["Associate", "Bachelor", "Master", "Doctorate"],
      university_id: this.education.university_id,
      universityName: this.education.university.name,
      degree: this.education.degree,
      major: this.education.major,
      start_month: this.education.start_month,
      start_year: this.education.start_year,
      end_month: this.education.end_month,
      end_year: this.education.end_year,
      edu_id: this.education.id,
      isPNC:false,
      PNC:"Passerelles numériques Cambodia",
      isAddUniver: false,
    };
  },
  methods: {
    editEductaion() {
        let newEdu = {
          start_month: this.start_month,
          start_year: this.start_year,
          end_month: this.end_month,
          end_year: this.end_year,
          degree: this.degree,
          major: this.major,
          university_id: this.university_id,
        };
        this.$emit("EditEdu", newEdu,this.edu_id);
      } ,
      getUniversityName(universityName){
          this.universityName = universityName;
          if (universityName == this.PNC){
            this.degrees = ['Associate']
            this.degree = 'Associate';
            this.isPNC = true;
          }else{
            this.degrees =["Associate", "Bachelor", "Master", "Doctorate"]
            this.isPNC = false;
          }
        },
        getUniversitID(university_id){
            this.university_id = university_id;
        },
        isAddedUniver(universityName){
            this.isAddUniver = false;
            this.universityName = universityName;
            this.$emit('added-new-univer')
        },
  },

};
</script>
