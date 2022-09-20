<template>
    <section >
          <!-- ResetPassword -->
       <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container rounded">
              <form class="w-[100%] flex flex-wrap" @submit.prevent="resetPassword">
                  <div class="w-[100%]">
                    <div class="w-[100%] bg-sky-300 text-center text-2xl text-white text-bold p-2">
                      <h1>Reset New Passord</h1>
                    </div>
                  </div>
                  <div class="w-[90%] m-auto mt-4">
                    <h1 class="font-extrabold">New password</h1>
                    <input type="text" placeholder="New password..." v-model="newpassword" class="shadow-md p-1 rounded-md w-[100%] mt-3 border-2 outline-blue-300 outline-2 border-gray-400">
                  </div>
                  <div class="w-[90%] m-auto mt-4">
                    <h1 class="font-extrabold">Comfirm new password</h1>
                    <input type="text" placeholder="Comfirm your password.." v-model="confirmPassword" class="shadow-md p-1 rounded-md w-[100%] mt-3 border-2 outline-blue-300 outline-2 border-gray-400">
                  </div>
                  <div class="w-[90%] flex m-5 justify-end">
                    <button class="w-[25%] bg-sky-300 p-2 text-bold mb-5 text-white rounded-md" type="submit" >Submit</button>
                  </div>
              </form>
            </div>
          </div>
      </div>
    </section>
</template>
<script>
export default {
  emits:['reset-password'],
  data(){
      return {
        newpassword:"",
        confirmPassword:"",
      }
  },
  methods:{
    resetPassword(){
      if(this.newpassword==this.confirmPassword && this.newpassword != '' && this.comfirmnewpassword != ''){
        this.$emit('reset-password',this.newpassword);
      }
    },
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