<template>
    <section>

            <div>
                <div class="flex w-[80%] m-auto">
                    <!-- Total alumni -->
                    <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="matchingStaus('all')">
                        <div class="w-[55%] flex flex-wrap p-2">
                            <div class="w-[88%]  p-2 text-start">
                                <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.length:0}}</h1>
                            </div>
                            <div class="w-[88%] m-auto">
                                <h5 class="text-md text-start">Total Alumni</h5>
                            </div>
                        </div>
                        <div class="w-[40%] m-auto">
                            <img class="w-[50%] m-auto" src="../../assets/total.png">
                        </div>
                    </div>
                    <!-- active alimni -->
                    <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="matchingStaus('actived')">
                        <div class="w-[55%] flex flex-wrap p-2">
                            <div class="w-[88%]  p-2 text-start">
                                <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.filter(active => active['status'].toLowerCase()=='actived').length:0}}</h1>
                            </div>
                            <div class="w-[88%] m-auto">
                                <h5 class="text-md text-green-500 text-start">Active</h5>
                            </div>
                        </div>
                        <div class="w-[40%] m-auto">
                            <img src="../../assets/active.png">
                        </div>
                    </div>
                    <!-- invite -->
                    <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="matchingStaus('invited')">
                        <div class="w-[55%] flex flex-wrap p-2">
                            <div class="w-[88%]  p-2 text-start">
                                <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.filter(active => active['status'].toLowerCase()=='invited').length:0}}</h1>
                            </div>
                            <div class="w-[88%] m-auto">
                                <h5 class="text-md text-blue-500 text-start">Invite</h5>
                            </div>
                        </div>
                        <div class="w-[40%] m-auto">
                            <img src="../../assets/invite.png">
                        </div>
                    </div>
                    <!-- pending -->
                    <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="matchingStaus('pending')">
                        <div class="w-[55%] flex flex-wrap p-2">
                            <div class="w-[88%]  p-2 text-start">
                                <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.filter(active => active['status'].toLowerCase()=='pending').length:0}}</h1>
                            </div>
                            <div class="w-[88%] m-auto">
                                <h5 class="text-md  text-yellow-500">Pending</h5>
                            </div>
                        </div>
                        <div class="w-[40%] m-auto">
                            <img src="../../assets/padding.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded p-6">
                <div class="flex justify-between">
                    <div class="flex">
                        <select @click="showAlumni" v-model="statusSelected"  class="w-[14rem] border-[1px] border-gray-500 p-2 shadow-md rounded cursor-pointer focus:border-skyblue outline-none">
                            <option value="all">All</option>
                            <option value="actived">Actived</option>
                            <option value="invited">Invited</option>
                            <option value="pending">Pending</option>
                        </select>
                        <div class="w-[30rem] flex justify-start ml-3">
                            <input v-model="search" type="text" placeholder="Search..." class="w-64 border border-stone-400 rounded px-5 py-2 pr-11 outline-none shadow focus:border-skyblue focus:w-full transition-all duration-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-7 relative right-9 top-2 text-stone-400 rounded" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                    <div v-if="this.$store.state.role== 'ero'" class="w-[20%]">
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
                            <button @click="$emit('showDetail',alumni)"  class= "bg-skyblue hover:bg-[#23afda] shadow  rounded px-5 py-2 ml-3">
                                <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
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
        </div>
    </section>
</template>
<script>
import AlumniDetail from "./AlumniDetail.vue"
export default {

    emits: ['invite','removeAlumni','showDetail','matchAlumni'],
    props:['alumnis', 'countAlumnis'],
    components:{'alumni-detail': AlumniDetail},
    name:'form-list',
    data(){
        return{
            search:"",
            alumniDetail:{},
            isDetail:false,
            statusSelected:'all'
        }
    },

    watch:{
        search(value){
            this.search=value
            this.$emit('searchAlumni', this.search)
        }
    },
    methods:{
        showAlumni(){
            this.$emit('matchAlumni',this.statusSelected)
        },
        matchingStaus(status){
            this.statusSelected=status
            this.$emit('matchAlumni',status)

        },
        showDetail(alumni){
            this.alumniDetail = alumni;
            this.isDetail = true;
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