<template>
  <section class="z-[100] fixed left-0 top-0 w-full h-full bg-white">
    <div class="flex h-full items-center ml-10">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" alt="logo" class="w-[45%] m-auto" />
      <div class="rounded mb-2 w-[40%] m-auto mt-[15px]">
        <form class="p-3 bg-[#CCE7F6] rounded mr-10 border-white" @submit.prevent="register">
          <h1 class="text-2xl font-semibold text-center p-1 mt-3">
            INPUT INFORMATION
          </h1>
          <div class="flex mt-5">
            <div class="w-[49%] m-1">
              <label class="block text-gray-700 text-lg mb-1">
                First Name <span class="text-red-500">*</span>
              </label>
              <input
                v-model="first_name"
                class="shadow appearance-none border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:outline-primary focus:shadow-outline"
                type="text"
                placeholder="First name..."
              />
            </div>
            <div class="w-[49%] m-1">
              <label class="block text-gray-700 text-lg mb-1">
                Last Name <span class="text-red-500">*</span>
              </label>
              <input
                v-model="last_name"
                class="shadow appearance-none border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:outline-primary focus:shadow-outline"
                type="text"
                placeholder="Last name..."
              />
            </div>
          </div>
          <div class="mb-2 relative">
              <label class="block text-gray-700 text-lg mb-1 ml-1" for="email">
                Email <span class="text-red-500">*</span>
              </label>
              <input
                v-model="email"
                class="appearance-none border border-none border-gray-400 outline-none rounded w-[98%] ml-1 py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-primary focus:shadow-outline"
                id="email"
                type="text"
                placeholder="email..."
              />
            </div>
            <div class="mb-2 relative">
              <label class="block text-gray-700 text-lg mb-1 ml-1" for="phone">
                Phone <span class="text-red-500">*</span>
              </label>
              <input
                v-model="phone"
                class="appearance-none border border-none border-gray-400 outline-none rounded w-[98%] ml-1 py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-primary focus:shadow-outline"
                id="phone"
                type="text"
                placeholder="phone..."
              />
            </div>
          <div class="flex">
            <div class="w-[49%] m-1">
              <label class="block text-gray-700 text-lg mb-1"> Batch <span class="text-red-500">*</span> </label>
              <select
                v-model="batch"
                id="batch"
                class="w-full rounded border p-2 focus:outline-none text-gray-500 tesx-sm"
              >
                <option value="" selected disabled>Select Your batch</option>
                <option :value="2021 -i" v-for:="(year,i) in 15">{{2021 - i}}</option>
              </select>
            </div>
            <div class="w-[49%] m-1">
              <label class="block text-gray-700 text-lg mb-1"> Major <span class="text-red-500">*</span> </label>
              <select
                v-model="major"
                id="batch"
                class="w-full rounded border p-2 focus:outline-none text-gray-500 text-sm"
              >
                <option value="" selected disabled>Select Your Major</option>
                <option value="WEB">WEB</option>
                <option value="SNA">SNA</option>
                <option value="IT">IT</option>
              </select>
            </div>
          </div>
          <div class="ml-2">
            <label class="block text-gray-700 text-lg mb-1">Gender <span class="text-red-500">*</span></label>
            <div class="flex">
              <div class="flex items-center mb-4">
                <input
                  type="radio"
                  value="M"
                  name="gender"
                  v-model="gender"
                  class="w-4 h-4 bg-white border-gray-300 dark:ring-offset-gray-800 focus:ring-2"
                  id="m"
                />
                <label
                  class="ml-2 text-sm font-medium text-gray-600"
                  for="m"
                  >Male</label
                >
              </div>
              <div class="flex items-center mb-4 ml-2">
                <input
                  v-model="gender"
                  type="radio"
                  id="f"
                  name="gender"
                  value="F"
                  class="w-4 h-4 bg-white border-gray-300 dark:ring-offset-gray-800 focus:ring-2"
                />
                <label
                  class="ml-2 text-sm font-medium text-gray-600"
                  for="f"
                  >Female</label
                >
              </div>
              <div class="flex items-center mb-4 ml-2">
                <input
                  v-model="gender"
                  type="radio"
                  id="other"
                  name="gender"
                  value="Other"
                  class="w-4 h-4 bg-white dark:ring-offset-gray-800 focus:ring-2"
                />
                <label
                  class="ml-2 text-sm font-medium text-gray-600"
                  for="other"
                  >Other</label
                >
              </div>
            </div>
          </div>
          <button
            class="bg-[#22BBEA] text-white py-2 w-[98%] px-4 rounded focus:outline-primary focus:shadow-outline ml-1 mb-2"
            type="submit"
          >
            Register
          </button>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
  import axios from "../../axios-http"
export default {
  data(){
    return {
      first_name: "",
      last_name: "",
      email: "",
      phone: "",
      batch: "",
      major: "",
      gender: "",
    }
  },
  methods:{
    register(){
      var user = {
        'first_name': this.first_name, 
        'last_name': this.last_name, 
        'email':this.email,
        'phone':this.phone,
        'batch':this.batch,
        'major':this.major,
        'gender':this.gender,
        'role':'alumni',
        'status':'pending',
      }
      axios.post('useralumni', user)
      this.$router.push('login')
    }
  }
};
</script>

<style></style>