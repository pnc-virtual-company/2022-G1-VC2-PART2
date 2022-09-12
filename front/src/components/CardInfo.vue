<template>
    <div class="bg-blue-200 p-3 rounded">
      <div class="flex justify-between">
        <h1 class="font-bold text-lg">General Information</h1>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
          </svg>
        </div>
      </div>
      <div class="p-2">
        <div class="flex">
          <div class="w-[50%] flex">
            <div class="w-[30%]">
              <p>First Name:</p>
              <p>Gender:</p>
              <p>Major:</p>
            </div>
            <div>
              <p>{{user.first_name}}</p>
              <p>{{alumni.gender}}</p>
              <p>{{alumni.major}}</p>
            </div>
          </div>
          <div class="w-[50%] flex">
            <div class="w-[30%]">
              <p>Last Name:</p>
              <p>Batch:</p>
              <p>Tel:</p>
            </div>
            <div>
              <p>{{user.last_name}}</p>
              <p>{{alumni.batch}}</p>
              <p>{{alumni.phone}}</p>
            </div>
          </div>
        </div>
        <div class="flex">
          <div class="w-[15%]">
            <p>Email:</p>
          </div>
          <div>
            <p>{{user.email}}</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "@/axios-http"
export default {
  data(){
    return {
      apiURL:"alumni/1",
      alumni:[],
      user:[]
    }
  },

  methods:{
    getDataFromApi(){
      axios.get(this.apiURL).then((res)=>{
        this.alumni = res.data;
        this.user=res.data.user
        console.log(this.user);
      });
    },
  },

  mounted() {
        this.getDataFromApi();

    },
};
  </script>
  
  <style>
  
  </style>
  