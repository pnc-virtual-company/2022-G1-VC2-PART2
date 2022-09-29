<template>
  <div class="p-4 bg-[#23242986] fixed h-full w-full flex items-center top-0 z-100 m-auto">
      <div class="rounded mb-2 w-[40%] m-auto mt-[15px] bg-white" v-click-outside="onClickOutSide">
        <form class="p-3 rounded border-white" @submit.prevent="register">
          <div class="flex justify-between items-center">
            <p></p>
            <h1 class="text-xl font-semibold text-center">
              ERO RIGISTER
            </h1>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-red-500 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" @click="$emit('popUp', false)">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>

          </div>
          <div class="text-start">
              <div class="w-[100%] flex mt-5 justify-between ">
                  <div class="w-[49%] m-1">
                    <label class="block text-gray-700 text-lg mb-1">
                      First Name <span class="text-red-500">*</span>
                    </label>
                    <input
                      v-model="first_name"
                      class="border-[1px] border-gray-300 rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea] reguired"
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
                      class="border-[1px] border-gray-300 rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea]"
                      :class="{ 'border-red-500 bg-red-100': is_lastname}"
                      type="text"
                      placeholder="Last name..."
                    />
                  </div>
              </div>
              <div class="mb-2 relative w-[98%] m-atuo m-1">
                <label class="block text-gray-700 text-lg mb-1" for="email">
                  Email <span class="text-red-500">*</span>
                </label>
                <input v-model="email" class="border-[1px] border-gray-300 rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:shadow-outline focus:border-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_email}" id="email" type="email" placeholder="email..."
                />
              </div>
              <div class="text-red-500 text-sm mb-2 m-1">{{sms_erorr_email}}</div>
              <p class="text-medium">{{inviteMessage}}</p>
              <button class="bg-[#22BBEA] text-white py-2 w-[98%] px-4 rounded focus:shadow-outline ml-1 mb-2 mt-4">
              Invite
              </button> 
          </div>
        </form>
      </div>
  </div>
</template>

<script>
export default {
  props:['inviteMessage'],
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
      sms_erorr_email: '',
    }
  },
  methods:{
    onClickOutSide(){this.$emit('popUp', false)},
    register(){
      if(this.validate()){
        if (this.email.match(/^[\w.]+@([\w-]+\.)+[\w-]{2,3}$/)) {
          var user = {
          'first_name': this.first_name, 
          'last_name': this.last_name, 
          'email':this.email,
          'role':'ero',
          'status':'invited',
          }
          this.$emit('register', user)
        }else {
          this.is_email = true;
          this.sms_erorr_email = 'This email address is not valid';
        }
      }
    },   
    validate() {
      this.is_firstname = false;
      if(this.first_name.trim() == '') {
          this.is_firstname = true;
      }
      this.is_lastname = false;
      if(this.last_name.trim() == '') {
          this.is_lastname = true;
      }
      this.is_email = false;
      this.sms_erorr_email = '';
      if (this.email.trim() == '') {
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