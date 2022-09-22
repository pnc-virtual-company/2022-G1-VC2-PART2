<template>
  <div tabindex="-1" class=" bg-[#000000b9] fixed   z-50 md:inset-0 h-modal md:h-full">
    <div  class="modal bg-white h-auto shadow-md rounded mt-24 mb-10 m-auto w-[40%] z-10">
        <div class="w-full bg-skyblue p-2">
            <h4 class="font-bold text-center text-white text-[20px]">Add University</h4>
        </div>
        <div class="w-16 h-16 m-auto ">
            <div class="flex justify-center mt-4 relative">
                <img v-if="profile==''" class="w-16 h-16 rounded-full border-[1px] border-skyblue object-cover" src="../../../assets/university.png" alt="">
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
            <div class="w-full m-auto px-4 mt-4">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" id="floating_name" v-model="name" class="block text-gray-900 py-2.5 px-0 w-full text-sm bg-transparent border-b-[1px] border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name <span class="text-red-500">*</span></label>
                </div>
            </div>
            <div class="w-full m-auto px-4">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" id="floating_address" v-model="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-[1px] border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address <span class="text-red-500">*</span></label>
                </div>
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
            let img = event.target.files[0];
            if (img != undefined) {
                this.profile = img;
                this.imgURL = URL.createObjectURL(this.profile);
            }
        },
        addUniversity(){
            let newUniversity = new FormData();
            newUniversity.append('name',this.name);
            newUniversity.append('address',this.address);
            newUniversity.append('profile',this.profile);
            axios.post("university/create", newUniversity).then(() => {
                return  this.$emit('is-added-univer',this.name);
            });
        },
    }
}
</script>
