<template>
  <section class="z-[100] fixed left-0 top-0 w-full h-full bg-white">
    <div class="flex h-full items-center ml-10">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" alt="logo" class="w-[45%] m-auto" />
      <div class="rounded mb-2 w-[40%] m-auto mt-[15px]">
        <form class="p-3 bg-[#CCE7F6] rounded mr-10 border-white">
          <h1 class="text-2xl font-semibold text-center p-1 mt-3">
            INPUT INFORMATION
          </h1>
          <div v-if="step1">
              <div class="w-[100%] flex mt-5 justify-between">
                <div class="w-[49%] m-1">
                  <label class="block text-gray-700 text-lg mb-1">
                    First Name <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="first_name"
                    class="shadow border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea] reguired"
                    :class="{ 'border-red-500 bg-red-100': is_firstname}"
                    type="text"
                    placeholder="First name..."
                  />
                </div>
                <div class="w-[49%] m-1">
                  <label class="block text-gray-700 text-lg mb-1 ">
                    Last Name <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="last_name"
                    class="shadow border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea]"
                    :class="{ 'border-red-500 bg-red-100': is_lastname}"
                    type="text"
                    placeholder="Last name..."
                  />
                </div>
              </div>
              <div class="mb-2 relative w-[99%] m-atuo">
                <label class="block text-gray-700 text-lg mb-1 ml-1" for="email">
                  Email <span class="text-red-500">*</span>
                </label>
                <input v-model="email" class="shadow border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_email}" id="email" type="email" placeholder="email..."
                />
              </div>
              <div class="mb-2 relative w-[99%] m-atuo">
                <label class="block text-gray-700 text-lg mb-1 ml-1" for="password">
                  Password <span class="text-red-500">*</span>
                </label>
                <input  v-model="password" :type="showpassword"  class="shadow border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea] " :class="{ 'border-red-500 bg-red-100': is_password}" id="password" placeholder="Password..."/>
                <svg  v-if="showpassword == 'password'"  @click="showPW"  xmlns="http://www.w3.org/2000/svg"  class=" h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer  "  viewBox="0 0 20 20"  fill="currentColor"  >
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                  <path  fill-rule="evenodd"  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"  clip-rule="evenodd"  />
                </svg>
                <svg
                  v-else
                  @click="showPW"
                  xmlns="http://www.w3.org/2000/svg"
                  class=" h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer " viewBox="0 0 20 20" fill="currentColor">
                  <path
                    fill-rule="evenodd"
                    d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                    clip-rule="evenodd"
                  />
                  <path
                    d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"
                  />
                </svg>
              </div>
              <button @click.prevent="next()" class="bg-[#22BBEA] text-white py-2 w-[98%] px-4 rounded focus:shadow-outline ml-1 mt-4">
              Next
              </button> 
        </div>
        <div v-else>
        <div class="mb-2 relative">
          <label class="block text-gray-700 text-lg mb-1 ml-1" for="phone">
            Phone <span class="text-red-500">*</span>
          </label>
          <input
            v-model="phone"
            class="shadow border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea]"
            :class="{ 'border-red-500 bg-red-100': is_phone}"
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
            class="w-full rounded border p-2 outline-none text-gray-500 tesx-sm"
            :class="{ 'border-red-500 bg-red-100': is_batch}"
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
            :class="{ 'border-red-500 bg-red-100': is_major}"
          >
            <option value="" selected disabled>Select Your Major</option>
            <option value="WEB">WEB</option>
            <option value="SNA">SNA</option>
          </select>
        </div>
        </div>
        <div class="ml-2">
        <label class="block text-gray-700 text-lg mb-1 mt-4">Gender <span class="text-red-500">*</span></label>
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
        class="bg-[#22BBEA] text-white py-2 w-[98%] px-4 rounded focus:shadow-outline ml-1 mt-4"
        @click.prevent="register"
        >
        Register
        </button>
        </div>
        <p class="text-gray-800 mt-6 text-center mb-2">Already have an account?
           <router-link to="login"
              class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">
              Login here
            </router-link>
        </p>
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
      password: "",
      step1:true,
      showpassword: "password",
      is_firstname:false,
      is_lastname:false,
      is_email:false,
      is_password:false,
      is_phone:false,
      is_batch:false,
      is_major:false,
      erorr_email:'',

    }
  },
  methods:{
    register(){
      if(this.validate()){
        var user = {
        'first_name': this.first_name, 
        'last_name': this.last_name, 
        'email':this.email,
        'password':this.password,
        'phone':this.phone,
        'batch':this.batch,
        'major':this.major,
        'gender':this.gender,
        'role':'alumni',
        'status':'pending',
        }
        axios.post('register', user)
        axios.post('sendRegister', {email: this.email});
        this.$router.push('login')
      }
    },
    showPW() {
      if (this.showpassword == "password") {
        this.showpassword = "text";
      } else {
        this.showpassword = "password";
      }
    },
    next() {
      if(this.validateStep1()){
        this.step1 = false;
      }
    },
    validateStep1() {
      this.is_firstname = false;
      if(this.first_name.trim() == '') {
          this.is_firstname = true;
      }
      this.is_lastname = false;
      if(this.last_name.trim() == '') {
          this.is_lastname = true;
      }
      this.is_password = false;
      if(this.password.trim() == '') {
          this.is_password = true;
      }
      this.is_email = false;
      if (this.email.match(/^[\w.]+@([\w-]+\.)+[\w-]{2,3}$/)) {
        this.is_email = false;
      }else{
        this.is_email = true;
      }
      let message = true;
      if (this.is_firstname || this.is_lastname || this.is_email || this.is_password ) {
          message = false;
      }
      return message;
  },
    validate() {
      this.is_phone = false;
      if (this.phone.match(/^[0]\d{9}$/) || this.phone.match(/^[0]\d{8}$/)) {
        this.is_phone = false;
      }else {
        this.is_phone = true;
      }
      this.is_batch = false;
      if(this.batch == '') {
          this.is_batch = true;
      }
      this.is_major = false;
      if(this.major.trim() == '') {
          this.is_major = true;
      }
      let message = true;
      if (this.is_phone || this.is_batch || this.is_major ) {
          message = false;
      }
      return message;
  }
  }
};
</script>

<style></style>