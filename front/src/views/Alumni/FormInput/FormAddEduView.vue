<template>
        <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full">
        <div class="modal bg-white h-auto shadow-md rounded p-5 mt-2 mb-10 m-auto w-[40%] z-10">
            <h4 class="font-bold text-center">Add Education Background</h4>
            <div class="w-[100%] my-2 p-2">
                 <label class="w-[12rem] text-start text-sm font-bold">University: </label>
                 <select v-model="university_id" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500">
                     <option selected disabled class="text-gray-900" value="0">Choose university</option>
                     <option v-for:="university in universities" :value='university.id'>{{university.name}}</option>
                 </select>
            </div>
            <div class="w-[100%] my-2 p-2">
                 <label class="w-[12rem] text-start text-sm font-bold">Degree: </label>
                 <select v-model="degree" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500">
                     <option selected disabled class="text-gray-900" value="">Choose degree</option>
                     <option v-for:="deg in degrees" :value='deg'>{{deg}}</option>
                 </select>
            </div>
             
            <div class="date flex justify-between my-2 p-0">
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] text-start text-sm font-bold">Start date: </label>
                    <select v-model="start_month" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2">
                        <option selected disabled value="month">Month</option>
                        <option v-for:="month in months" :value="month">{{month}}</option>
                    </select>
                </div>
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] text-start text-sm font-bold text-white">S</label>
                    <select v-model="start_year" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2">
                        <option selected disabled value="">Year</option>
                        <option v-for:="(year, i) in 101" :value="2022-i">{{2022-i}}</option>
                    </select>
                </div>
            </div>
            <div class="date flex justify-between my-2 p-0">
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] text-start text-sm font-bold">End Date (or expected) : </label>
                    <select v-model="end_month" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2">
                        <option selected disabled value="">Month</option>
                        <option v-for:="month in months" :value="month">{{month}}</option>
                    </select>
                </div>
                <div class="w-[100%] mx-2 text-start">
                    <label class="w-[10rem] text-start text-sm font-bold text-white">S</label>
                    <select v-model="end_year" class="block p-2 w-full outline-none text-gray-900  rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 mt-2 mb-2">
                        <option selected disabled value="">Year</option>
                        <option v-for:="(year, i) in 101" :value="2022-i">{{2022-i}}</option>
                    </select>
                </div>
            </div>
            <error class="mb-3 w-[97%] m-auto" v-if="messError!=null">{{messError}}</error>

             <div class="btn-controller flex justify-end">
                 <button @click="$emit('cancelAdd')" class="bg-[#ff9933] text-white font-bold py-1 mx-2 px-4 rounded">
                     Cancel
                 </button>
                 <button @click="addEductaion()" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 mx-2 px-4 rounded">
                     Add
                 </button>
             </div>
        </div>
    </div>
</template>

<script>
import error from "../../../components/Widget/ErrorView.vue";

export default {
  components: { error },
  props: ["universities"],
  emits: ["addEdu",'cancelAdd'],
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
      university_id: 0,
      degree: "",
      start_month: "month",
      start_year: "",
      end_month: "",
      end_year: "",
      start_date: "",
      end_date: "",
      messError: null,
    };
  },
  methods: {
    addEductaion() {
      this.messError = null;
      this.start_date = this.start_month + "/" + this.start_year;
      this.end_date = this.end_month + "/" + this.end_year;
      if (
        this.university_id != "" &&
        this.start_date != "" &&
        this.end_date != "" &&
        this.degree != ""
      ) {
        let newEdu = {
          start_date: this.start_date,
          end_date: this.end_date,
          degree: this.degree,
          alumni_id: 1,
          university_id: this.university_id,
        };
        this.$emit("addEdu", newEdu);
      } else {
        this.messError = "Your input is invalid, please check your input!!";
      }
    },
  },
};
</script>
