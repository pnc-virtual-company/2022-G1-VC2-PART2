<template>
<div v-if="!isAddUniver" class=" bg-[#000000b9] fixed   z-50 md:inset-0 md:h-full">
  <div  class="bg-white h-auto shadow-md rounded mt-20  m-auto w-[40%] z-10" v-click-outside="onClickOutside">
    <div class="w-full bg-skyblue p-2">
      <h4 class="font-bold text-center text-white text-[20px]">Add Education</h4>
    </div>
    <div class="pb-5 pl-5 pr-5">
      <div class="w-[100%] my-2 p-2">
            <label class="w-[12rem] text-start text-sm font-medium">Universities </label>
            <input-university :universities="universities" @university-id="getUniversitID" @university-name="getUniversityName" @is-add-univer="isAddUniver = true"></input-university>
      </div>
      <div class="w-[100%] my-2 p-2">
            <label class="w-[12rem] text-start text-sm font-medium">Major </label>
            <input v-if="!isPNC" type="text" v-model="major" placeholder="name" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_degree}">
            <select v-else v-model="major" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_degree}">
                <option selected disabled class="text-gray-900" value="">Choose major</option>
                <option :value="'WEB'">WEB</option>
                <option :value="'SNA'">SNA</option>
            </select>
      </div>
      <div class="w-[100%] my-2 p-2">
            <label class="w-[12rem] text-start text-sm font-medium">Degree </label>
            <select v-model="degree" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_degree}">
                <option selected disabled class="text-gray-900" value="">Choose degree</option>
                <option v-for:="deg in degrees" :value='deg'>{{deg}}</option>
            </select>
      </div>
        
      <div class="date flex justify-between my-2 p-0">
          <div class="w-[100%] mx-2 text-start">
              <label class="w-[10rem] text-start text-sm font-medium">Start date </label>
              <select v-model="start_month" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_start_month}">
                  <option selected disabled value="">Month</option>
                  <option v-for:="month in months" :value="month">{{month}}</option>
              </select>
          </div>
          <div class="w-[100%] mx-2 text-start">
              <label class="w-[10rem] text-start text-sm font-bold text-white">S</label>
              <select v-model="start_year" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_start_year}">
                  <option selected disabled value="">Year</option>
                  <option v-for:="(year, i) in 16" :value="2022-i">{{2022-i}}</option>
              </select>
          </div>
      </div>
      <div class="date flex justify-between my-2 p-0">
          <div class="w-[100%] mx-2 text-start">
              <label class="w-[10rem] text-start text-sm font-medium">End Date (or expected)  </label>
              <select v-model="end_month" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_end_month}">
                  <option selected disabled value="">Month</option>
                  <option v-for:="month in months" :value="month">{{month}}</option>
              </select>
          </div>
          <div class="w-[100%] mx-2 text-start">
              <label class="w-[10rem] text-start text-sm font-bold text-white">S</label>
              <select v-model="end_year" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2 focus:border-[#22bbea]"  :class="{ 'border-red-500 bg-red-100': is_end_year}">
                  <option selected disabled value="">Year</option>
                  <option v-for:="(year, i) in 16" :value="2022-i">{{2022-i}}</option>
              </select>
          </div>
      </div>
      <div class="btn-controller flex justify-end">
          <button @click="$emit('cancelAdd')" class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline"> 
              Cancel
          </button>
          <button @click="addEductaion()" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
              Add
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
import FormInputUniversity from './FormInputUniversity.vue';
import FormAddUniver from './FormAddUniver.vue';

export default {
  components:{
    'input-university': FormInputUniversity,
    'form-add-univer': FormAddUniver,
  },
  props: ["universities"],
  emits: ["addEdu", "cancelAdd",'added-new-univer'],
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
      university_id: null,
      universityName: null,
      major: "",
      degree: "",
      start_month: "",
      start_year: "",
      end_month: "",
      end_year: "",
      start_date: "",
      end_date: "",
      is_university: false,
      is_degree: false,
      is_start_month: false,
      is_start_year: false,
      is_end_month: false,
      is_end_year: false,
      isPNC : false,
      isAddUniver: false,
    };
  },
  methods: {
    addEductaion() {
      this.messError = null;
      this.start_date = this.start_month + "/" + this.start_year;
      this.end_date = this.end_month + "/" + this.end_year;
      if (this.validate() ) {
        if(this.university_id != null){
          let newEdu = {
            start_month: this.start_month,
            start_year: this.start_year,
            end_month: this.end_month,
            end_year: this.end_year,
            degree: this.degree,
            major: this.major,
            alumni_id: 1,
            university_id: this.university_id,
          };
          this.$emit("addEdu", newEdu);
        }
      } 
    },
    getUniversitID(university_id){
      this.university_id = university_id;
    },
    getUniversityName(universityName){
      this.universityName = universityName;
      if (this.universityName == "Passerelles numériques Cambodia"){
        this.degrees = ['Associate']
        this.degree = 'Associate';
        this.isPNC = true;
      }else{
        this.degrees =["Associate", "Bachelor", "Master", "Doctorate"]
        this.degree = '';
        this.isPNC = false;
        this.major = '';
      }
    },
    isAddedUniver(universityName){
      this.isAddUniver = false;
      this.universityName = universityName;
      this.$emit('added-new-univer');
    },
    onClickOutside(){
      this.$emit('cancelAdd')
    },

    validate() {
      this.is_university = false;
      if (this.university_id == null) {
        this.is_university = true;
      }
      this.is_degree = false;
      if (this.degree.trim() == "") {
        this.is_degree = true;
      }
      this.is_start_month = false;
      if (this.start_month.trim() == "") {
        this.is_start_month = true;
      }
      this.is_start_year = false;
      if (this.start_year == "") {
        this.is_start_year = true;
      }
      this.is_end_month = false;
      if (this.end_month.trim() == "") {
        this.is_end_month = true;
      }
      this.is_end_year = false;
      if (this.end_year == "") {
        this.is_end_year = true;
      }
      
      let message = true;
      if (
        this.is_university ||
        this.is_degree ||
        this.is_start_month ||
        this.is_start_year ||
        this.is_end_month ||
        this.is_end_year 
      ) {
        message = false;
      }
      return message;
    },
  },
};
</script>
