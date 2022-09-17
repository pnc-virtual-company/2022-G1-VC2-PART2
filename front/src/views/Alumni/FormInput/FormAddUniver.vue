<template>
  <div tabindex="-1" class=" bg-[#000000b9] fixed   z-50 md:inset-0 h-modal md:h-full">
    <div  class="modal bg-white h-auto shadow-md rounded mt-24 mb-10 m-auto w-[40%] z-10">
        <div class="w-full bg-skyblue p-2">
            <h4 class="font-bold text-center text-white text-[20px]">Add University</h4>
        </div>
        <div class="w-16 h-16 m-auto ">
            <div class="flex justify-center mt-4 relative">
                <img v-if="profile==''" class="w-16 h-16 rounded-full border-[1px] border-gray-400 object-cover" src="../../../assets/pnc-round.png" alt="">
                <img v-else class="w-16 h-16 rounded-full border-[1px] border-gray-400 object-cover" :src="imgURL" alt="">
                <input @change="tageImage($event)" id="profile-upload" type="file" accept="image/*" hidden>
                <label for="profile-upload">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 hover:cursor-pointer bg-gray-300 p-1 rounded-full bottom-0 right-[-10px] absolute">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                </label>
            </div>          
        </div>
        <div class="pb-5 pl-5 pr-5">
            <div class="w-[100%] my-2 p-2">
                <label class="w-[12rem] text-start text-sm font-medium">Name </label>
                <input v-model="name" type="text" placeholder="Type here" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]">
            </div>
            <div class="w-[100%] my-2 p-2">
                <label class="w-[12rem] text-start text-sm font-medium">Address </label>
                <input v-model="address" type="text" placeholder="Type here" class="mt-2 block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea] h-auto">
            </div>
            <div class="btn-controller flex justify-end">
                <button @click="$emit('cancelAddUniver')" class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline"> 
                    Cancel
                </button>
                <button @click="addUniversity()" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
                    Add
                </button>
            </div>
        </div>
    </div>
  
  </div>
</template>

<script>
import axios from '../../../axios-http'

export default {
    data(){
        return {
            profile:'',
            imgURL:'',
            name:'',
            address:'',
        }
    },
    methods:{
        tageImage(event){
            this.profile = event.target.files[0];
            this.imgURL = URL.createObjectURL(this.profile);
        },
        addUniversity(){
            let newUniversity = {name:this.name, address:this.address, profile:this.profile};
            axios.post("university/create", newUniversity).then(() => {
                return  this.$emit('is-added-univer',this.name);
            });
        },
    }
}
</script>

<style>

</style>