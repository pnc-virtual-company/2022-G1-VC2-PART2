<template>
  <section class="z-[100] fixed left-0 top-0 w-full h-full bg-white">
    <div class="flex  items-center h-full">
      <div class="w-[50%] m-auto">
        <img src="../../assets/login_image.jpg" alt="logo" class="w-[90%] m-auto"  />
      </div>
      <div class="rounded w-[50%] m-auto">
        <form class="p-5 bg-[#CCE7F6] rounded w-[70%] m-auto" @submit.prevent="login"> 
          <img
            src="../../assets/alumni.png"
            alt="logo"
            class="w-[100px] m-auto"
          />
          <!-- <h1 class="text-2xl font-semibold text-center p-1">LOGIN</h1> -->

          <div class="mb-2 relative">
            <label class="block text-gray-700 text-lg mb-1 mt-4" for="email">
              Email <span class="text-red-600">*</span>
            </label>
            <input v-model="email" @change="is_not_fill_email=false" :class="{'bg-red-100 border-red-400':is_not_fill_email}"
              class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700  leading-tight focus:outline-primary focus:shadow-outline focus:outline-[#22bbea]"
              id="email"
              type="email"
              placeholder="Email..."
            />
            <svg
              v-if="is_not_fill_email"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 absolute top-[40px] right-3 text-red-500"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                clip-rule="evenodd"
              />
            </svg>
            <div class=" relative mt-4">
              <label class="block text-gray-700 text-lg mb-1 " for="password">
                Password <span class="text-red-600">*</span>
              </label>
              <input v-model="password" :type="showpassword" @change="is_not_fill_password=false" @input="isInValid=false"
                :class="{'bg-red-100 border-red-400':is_not_fill_password}"
                class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700  leading-tight focus:outline-primary focus:shadow-outline focus:outline-[#22bbea]"
                id="password"
                placeholder="Password..." 
              />
              <svg
                v-if="isInValid"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute top-[40px] right-3 text-red-500"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                />
              </svg>
              <svg
                v-else-if="showpassword == 'password'" @click="showPW"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path
                  fill-rule="evenodd"
                  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                  clip-rule="evenodd"
                />
              </svg>
              <svg
                v-else @click="showPW"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                  clip-rule="evenodd"
                />
                <path
                  d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"
                />
              </svg>
              <p v-if="isInValid" class="text-[14px] text-red-500">{{loginError}}</p>
            </div>
          </div>
            <router-link to="forgot"
                class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">
                Forget Password
            </router-link>
            <button
              class="bg-[#22bbea] text-white py-2 w-full rounded focus:outline-primary focus:shadow-outline mt-4 text-[1.2rem]"
              type="submit"
            >
              Login
            </button>
            <p class="text-gray-800 mt-6 text-center">Don't have an account? <router-link to="register"
                class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">Register</router-link>
            </p>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
import axios from '../../axios-http'
import encryptData from '../../helper/encryptData';
export default {
    components: {
    },
    data(){
        return {
            email: '',
            password: '',
            showpassword: 'password',
            isLoggingIn: false,
            isInValid: false,
            loginError: '',
            is_not_fill_email: false,
            is_not_fill_password: false,
        }
    },
    methods: {
        showPW(){
            if (this.showpassword == "password"){
                this.showpassword = "text";
            }else{
                this.showpassword = "password"
            }
        },
        async login(){
            if (this.checkFormValidation()){
                this.isLoggingIn = true;
                this.isInValid = false;
                try {
                    await axios.post('/login', {email: this.email, password: this.password})
                    .then(res=>{
                      if(res.data.status != "pending"){
                        this.isLoggingIn = false;
                        const token_encrypt = encryptData(res.data.token, 'my_token')
                        const role_encrypt = encryptData(res.data.role, 'my_role')
                        this.$cookies.set('alumni',token_encrypt);
                        this.$cookies.set('role',role_encrypt);
                        window.location.reload();
                      }else{
                        console.log(res.data.status);
                        this.loginError = "Your account is pending. Please try again later.";
                        this.isLoggingIn = false;
                        this.isInValid = true;
                      }
                    })
                } catch(err){
                  this.isLoggingIn = false;
                  this.isInValid = true;
                  this.loginError = "Invalid login !";
                  console.log(err);
                }
            }
        },
        checkFormValidation(){
            this.is_not_fill_email = false;
            if (this.email.trim() == ''){
                this.is_not_fill_email = true;
            }
            this.is_not_fill_password = false;
            if (this.password.trim() == ''){
                this.is_not_fill_password = true;
            }

            let sms = true;
            if (this.is_not_fill_email || this.is_not_fill_password){
                sms = false;
            }
            return sms;
        }
    },

    created(){
        if(this.$cookies.get('alumni')){
            this.isLoggingIn = true;
            setTimeout(() => {
                this.isLoggingIn = false;
                if(this.$cookies.get('role') == 'admin'){
                    this.$router.push('/explore')
                }else if(this.$cookies.get('role') == 'ero'){
                    this.$router.push('/explore')
                }else{
                    this.$router.push('/')
                }
            }, 1000);
        }
    },
}
</script>
