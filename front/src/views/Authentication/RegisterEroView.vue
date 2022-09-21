<template>
  <div class="p-4 bg-[#23242986] fixed h-full w-full flex items-center top-0 z-100 m-auto">
      <div class="rounded mb-2 w-[40%] m-auto mt-[15px] bg-[#CCE7F6]" v-click-outside="onClickOutSide">
        <div class="cancel flex justify-end w-[100%] m-auto p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-red-500 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" @click="$emit('popUp', false)">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
        <form class="p-3 rounded border-white" @submit.prevent="register">
          <h1 class="text-2xl font-semibold text-center p-1 mt-3">
            ERO RIGISTER
          </h1>
          <div class="text-start">
              <div class="w-[100%] flex mt-5 justify-between ">
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
              <button class="bg-[#22BBEA] text-white py-2 w-[98%] px-4 rounded focus:shadow-outline ml-1 mb-2 mt-4">
              Create
              </button> 
          </div>
        </form>
      </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      first_name: "",
      last_name: "",
      email: "",
      password: "",
      showpassword: "password",
      is_firstname:false,
      is_lastname:false,
      is_email:false,
      is_password:false,
      erorr_email:'',

    }
  },
  methods:{
    onClickOutSide(){this.$emit('popUp', false)},
    register(){
      if(this.validateStep1()){
        var user = {
        'first_name': this.first_name, 
        'last_name': this.last_name, 
        'email':this.email,
        'password':this.password,
        'role':'ero',
        'status':'pending',
        }
        this.$emit('register', user)
      }
    },
    showPW() {
      if (this.showpassword == "password") {
        this.showpassword = "text";
      } else {
        this.showpassword = "password";
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
  }
};
</script>

<style></style>