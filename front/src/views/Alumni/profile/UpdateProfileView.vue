<template>
    <div class="flex items-center w-full p-4 bg-[#23242986] fixed h-full top-0 z-100">
      <form @submit.prevent="$emit('save-upload')" enctype="multipart/form-data" class="bg-white rounded p-5 mt-24 m-auto text-center" v-click-outside="isUpdate">
          <div class="flex items-center justify-between mb-4 text-lg">
                <p></p>
              <p class="font-semibold">Upload Profile</p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" @click="$emit('isUpdate')">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
          </div>
          <div class="border-[1px] border-gray-300">
              <img class="w-[20rem] h-[20rem] object-cover object-center" :src="profile">
          </div>
          <div class="w-full mt-5">
              <button type="submit" class="btn bg-skyblue rounded p-2 text-white w-full">
                  Save Change
              </button>
          </div>
      </form>
    </div>
</template>
<script>
    export default {
        props:['profile'],
        methods:{
            isUpdate(){
                this.$emit('isUpdate');
            }
        }
    }
</script>
