<template>
    <section class="z-[100] fixed w-full h-full bg-white ">
      <div class="w-[100%] flex h-full items-center bg-white bg-cyan-50">
            <img src="../../assets/forgotpassword.png" alt="logo" class="flex w-[50%] m-auto">
            <div class="flex rounded mb-5 w-[50%] m-auto mt-[30px]">
                <form class="w-[70%] p-5 bg-sky-200 rounded m-auto" @submit.prevent="forgotpassword">
                    <img src="../../assets/alumnilogo.png" alt="logo" class="w-[100px] m-auto">
                    <h1 class="text-2xl font-semibold text-center p-1">Forgot Passord</h1>
                    <div class="mb-6 relative">
                        <label class="block text-gray-700 text-lg mb-1" for="password">
                            Email *
                        </label>
                        <input
                            class="appearance-none rounded w-full py-2 px-3 mb-1 leading-tight focus:outline-primary focus:shadow-outline"
                            v-model="email"
                            id="email" type="email" placeholder="Email...">
                    </div>
                    <button
                        class="bg-sky-300 text-white py-2 w-full px-4 rounded focus:outline-primary focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <!-- Verication code -->
        <varication @varication-code="veriFycode" v-if="showverification" />
        <!-- show reset password -->
        <resetpassword @reset-password="resetPS" v-if="showresetpassword"/>
    </section>
</template>
<script>
import varication from "./VerificationView.vue";
import resetpassword from "./Resetpassword.vue";
export default {
  emits:['forgot-password'],
  data(){
    return {
      email:"",
      codeverify:"",
      showverification:false,
      showresetpassword:false,
    }
  },
  components:{
    varication,
    resetpassword,
  },
  methods:{
    forgotpassword(){
      this.$emit('forgot-password',this.email);
      this.showverification = !this.showverification;
    },
    veriFycode(code){
      this.codeverify = code;
      this.showverification = !this.showverification;
      this.showresetpassword = !this.showresetpassword;
      console.log(code);
    },
    resetPS(password){
      this.showresetpassword = !this.showresetpassword;
      console.log(password);
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