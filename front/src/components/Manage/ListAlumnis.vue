<template>
    <div class="rounded p-6">
        <div class="flex justify-between">
            <div class="flex">
                <select @click="showAlumni"  class="w-[14rem] border-[1px] border-gray-500 p-2 shadow-md rounded cursor-pointer focus:border-skyblue outline-none">
                    <option value="all">All</option>
                    <option value="actived">Active</option>
                    <option value="invited">invite</option>
                    <option value="pending">peding</option>
                </select>
                <div class="w-[30rem] flex justify-start ml-3">
                    <input v-model="search" type="text" placeholder="Search..." class="w-64 border border-stone-400 rounded px-5 py-2 pr-11 outline-none shadow focus:border-skyblue focus:w-full transition-all duration-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-7 relative right-9 top-2 text-stone-400 rounded" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <div class="w-[20%]">
                <button class="w-[100%] p-1 bg-orange rounded text-white text-2xl text-bold shadow-md" @click="$emit('invite')">Invite</button>
            </div>
        </div>
        <!-- Card list -->
        <table class=" w-full  mt-5">
        <thead tabindex="0" class="h-14 w-full text-sm leading-none text-gray-800 bg-skyblue">
            <tr class="text-center">
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>MAJOR</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody v-if="alumnis.length > 0" class="w-full">
            <tr v-for:="alumni in alumnis" :key="alumni" tabindex="0" class=" h-12 text-sm leading-none text-gray-800 border-b-[1px] border-gray-400 bg-gray-300">
                <td class="text-center pl-4 w-[20%]">
                    <div class="flex items-center space-x-2 p-2">
                        <img class="rounded-full w-14 h-14 border-[1px] border-skyblue object-cover" :src="'http://127.0.0.1:8000/images/profile/'+ alumni.profile" alt="">
                        <p class="pl-6">{{alumni.first_name + " "+ alumni.last_name}}</p>
                    </div>
                </td>
                <td class="text-center w-[25%]">
                    {{alumni.email}}
                </td>
                <td class="text-center w-[20%]">
                    {{alumni.major==undefined? '?':alumni.major}}
                </td>
                <td class="text-center w-[20%]" :class="alumni['status']">
                    {{alumni.status}}
                </td>
                <td class="text-center relative w-[15%]">
                    <button @click="showDetail(alumni)"  class= "bg-skyblue hover:bg-[#23afda] shadow  rounded px-5 py-2 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white text-sm">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </button>
                    <button @click="$emit('removeAlumni', alumni['user_id'])"  class= " bg-red-500 hover:bg-red-600 shadow  rounded px-5 py-2 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            </tr>
        </tbody>
        <tbody v-if="alumnis.length <= 0">
            <tr class="bg-gray-300">
                <td colspan="5" class="p-2 text-center">
                    <img class="w-32 m-auto mt-3" src="./../../assets/notfound.png" alt="Image not found">
                    <p class="mb-5">No ALumnis found!</p>
                </td>
            </tr>
        </tbody>
    </table>
    <alumni-detail v-if="isDetail" :alumniDetail="alumniDetail" @approve="approve" @reject="reject"></alumni-detail> 
  </div>
</template>
<script>
    import AlumniDetail from "./AlumniDetail.vue"
export default {

    emits: ['invite','removeAlumni',],
    props:['alumnis'],
    components:{'alumni-detail': AlumniDetail},
    name:'form-list',
    data(){
        return{
            search:"",
            alumniDetail:{},
            isDetail:false,
        }
    },

    watch:{
        search(value){
            this.search=value
            this.$emit('searchAlumni', this.search)
        }
    },
    methods:{
        showAlumni(e){
            this.$emit('matchAlumni',e.target.value)
        },
        showDetail(alumni){
            this.alumniDetail = alumni;
            this.isDetail = true;
        },
        approve(user_id){
            this.$emit('approve',user_id)
            this.isDetail = false;
        },
        reject(user_id){
            this.$emit('reject',user_id)
            this.isDetail = false;
        },
    }
};

</script>

<style scoped>
    .actived{
        color:green;
    }
    .invited{
        color:blue
    }
    .pending{
        color:orange;
    }

</style>