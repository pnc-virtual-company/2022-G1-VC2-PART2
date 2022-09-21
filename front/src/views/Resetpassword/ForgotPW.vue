<template>
    <section class="z-[100] fixed left-0 top-0 w-full h-full">
      <div class="w-[100%] flex h-full items-center bg-white ">
        <div class="w-[50%]">
            <img src="../../assets/forgotpw.png" alt="logo" class="w-[70%] m-auto">
        </div>
        <div class="flex rounded w-[50%]">
            <form class="w-[70%] p-5 bg-[#CCE7F6] rounded m-auto" @submit.prevent="forgetpassword">
                <img src="../../assets/alumnilogo.png" alt="logo" class="w-[100px] m-auto">
                <h1 class="text-2xl font-semibold text-center p-1">Forgot Passord</h1>
                <div class="mb-6 relative">
                    <label class="block text-gray-700 text-lg mb-1" for="password">
                        Email *
                    </label>
                    <input
                        class="rounded w-full py-2 px-3 mb-1  focus:outline-skyblue "
                        v-model="email"
                        id="email" type="email" placeholder="Email...">
                      <p class="text-red-500 mb-[-10px] mt-[3px]">{{inValidEmail}}</p>
                </div>
                <button
                    class="bg-skyblue text-white py-2 w-full px-4 rounded focus:outline-primary focus:shadow-outline"
                    type="submit">
                    Submit
                </button>
            </form>
        </div>
      </div>
      <!-- Verication code -->
      <varication @varication-code="veriFycode" :verifyError="verifyError" v-if="showverification" />
      <!-- show reset password -->
      <resetpassword @reset-password="resetPS" v-if="showresetpassword"/>
    </section>
</template>
<script>
import varication from "./VerificationView.vue";
import resetpassword from "./Resetpassword.vue";
import axios from '../../axios-http';
export default {
  emits:['forgot-password'],
  data(){
    return {
      email:"",
      codeverify:"",
      showverification:false,
      showresetpassword:false,
      inValidEmail:'',
      verifyError:'',
      user_id:null,
    }
  },
  components:{
    varication,
    resetpassword,
  },
  methods:{
    forgetpassword(){
      axios.post("forgetPassword",{email:this.email})
      .then((res) => {
        if(res.data.message == "successfully") {
          axios.post("sendVerifyCode",{email:this.email})
          .then((res) => {console.log(res.data.message)});
          this.email = '';
          this.user_id = res.data.user_id;
          this.codeverify = res.data.verifyCode;
          this.showverification = !this.showverification;
          this.inValidEmail = '';
        }else{
          this.inValidEmail = 'Your verification email was not sent* !';
        }
      });
    },
    veriFycode(code){
      if(this.codeverify == code){
        this.showverification = !this.showverification;
        this.showresetpassword = !this.showresetpassword;
        this.verifyError = '';
      }else {
        this.verifyError = 'Your verification code is not valid* !';
      }
    },
    resetPS(newpassword){
      axios.post("resetPwAfterVerify/" + this.user_id,{newpassword:newpassword})
      .then((res)=>{
        console.log(res);
        this.showresetpassword = !this.showresetpassword;
        this.$router.push("/login");
      })
    }
  }
}
</script>
<style scoped>
   .modal-mask {
    position: fixed;
    z-index: 10;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
  }
  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }
  .modal-container {
    width: 33%;
    height: auto;
    margin: 0px auto;
    border-radius: 20px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
  }
  .modal-body {
    margin: 20px 0;
  }
  .modal-default-button {
    float: right;
  }
  .modal-enter-from,
  .modal-leave-to {
    opacity: 0;
  }
  .modal-enter-active .modal-container,
  .modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
</style>