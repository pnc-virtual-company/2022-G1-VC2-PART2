<template>
  <div class="w-[100%] flex flex-wrap">
    <forgotpassword  @forgot-password="forgotPS" />
  </div>
</template>

<script>
import forgotpassword from './Resetpassword/ForgotpasswordView.vue';
export default {
  data(){
    return {
      emailforgotpassword:"",
    }
  },
  components:{
    forgotpassword,
  },
  methods:{
    forgotPS(email){
      this.emailforgotpassword = email;
      console.log(this.emailforgotpassword)

    }
  }

}
</script>

