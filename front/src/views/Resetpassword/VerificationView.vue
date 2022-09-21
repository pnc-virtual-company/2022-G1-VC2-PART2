<template>
    <!-- verifycation -->
  <div class=" bg-[#000000b9] fixed z-50 md:inset-0 md:h-full flex items-center">
    <div  class="bg-white h-auto shadow-md rounded m-auto w-[35%] z-10">
      <div class="w-[100%] flex flex-wrap rounded">
          <div class="w-[100%]">
            <div class="w-[100%] bg-[#22bbea] text-center text-2xl text-white text-bold p-2 rounded-tr rounded-tl">
              <h1>verifycation</h1>
            </div>
          </div>
          <div class="w-[100%] mt-4">
            <div class="w-[93%] m-auto">
              <p class="ml-2">Verify code have been sent to your email</p>
            </div>
          </div>
          <div class="w-[90%] m-auto mt-4">
            <h1 class="font-medium ">Type code</h1>
            <input type="text" placeholder="Verify code..." v-model="verifyCode" class="shadow-md p-1 rounded-md w-[100%] mt-3 border-2 outline-blue-300 outline-2 border-gray-400">
            <p class="text-red-500 mb-[-10px] mt-[3px]">{{verifyError}}</p>
          </div>
          <div class="w-full flex mt-7 mb-6 mr-2 items-center justify-end pr-2">
            <button @click="$emit('cancel')" class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-6 rounded focus:outline-none focus:shadow-outline">Cancel</button>
            <button @click="$emit('verifycation-code',verifyCode)" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-8 rounded focus:outline-none focus:shadow-outline">Submit</button>
          </div>
      </div>
    </div>
  </div>


</template>
<script>
export default {
  props : ['verifyError'],
  emits:['verifycation-code','cancel'],
  data(){
      return {
        verifyCode:"",
      }
  },
}
</script>
