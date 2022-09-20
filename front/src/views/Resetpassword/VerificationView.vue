<template>
    <!-- verifycation -->
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container rounded">
              <form class="w-[100%] flex flex-wrap" @submit.prevent="verafiCode">
                  <div class="w-[100%]">
                    <div class="w-[100%] bg-sky-300 text-center text-2xl text-white text-bold p-2 ">
                      <h1>Varication</h1>
                    </div>
                  </div>
                  <div class="w-[100%] mt-4">
                    <div class="w-[93%] m-auto">
                      <p class="ml-2">Verify code have been sent to your email please check your email to get it</p>
                    </div>
                  </div>
                  <div class="w-[90%] m-auto mt-4">
                    <h1 class="font-extrabold ">Type code</h1>
                    <input type="text" placeholder="Varify code..." v-model="veraficode" class="shadow-md p-1 rounded-md w-[100%] mt-3 border-2 outline-blue-300 outline-2 border-gray-400">
                    <p class="text-red-500 mb-[-10px] mt-[3px]">{{verifyError}}</p>
                  </div>
                  <div class="w-[90%] flex m-5 justify-end">
                    <button class="w-[25%] bg-sky-300 p-2 text-bold mb-5 text-white rounded-md" type="submit" >Submit</button>
                  </div>
              </form>
            </div>
          </div>
      </div>
</template>
<script>
export default {
  props : ['verifyError'],
  emits:['varication-code'],
  data(){
      return {
        veraficode:"",
      }
  },
  methods:{
    verafiCode(){
      this.$emit('varication-code',this.veraficode);
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