<template>
    <!--  list Form-->
    <form class="border-2 border-blue-500 w-[76%] m-auto mt-5 rounded-sm">
        <!-- header -->
        <div class="w-[93%] flex flex-wrap m-auto mt-5">
            <div class="w-[25%]">
                <select @click="showAlumni"  class="w-[90%] border-2 border-gray-500 p-2 shadow-md rounded-md cursor-pointer">
                    <option value="all">All</option>
                    <option value="actived">Active</option>
                    <option value="invited">invite</option>
                    <option value="peding">peding</option>
                </select>
            </div>
            <div class="w-[50%] border-2 border-gray-700 mr-5 rounded-md shadow-sm p-2 flex flex-wrap">
                <div class="w-[80%] m-auto">
                    <input v-model="search" type="text" placeholder="Search..." class="w-[100%] outline-none">
                </div>
                <div class="w-[15%] m-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-[30%] m-auto" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
            </div>
            <div class="w-[20%] ml-7">
                <button class="w-[100%] p-1 bg-blue-500 rounded-md text-white text-2xl text-bold shadow-md">Invite</button>
            </div>
        </div>
        <!-- Card list -->
    <table class=" table-auto w-[98%] flex flex-wrap m-auto mt-5">
        <thead class="w-[95%] flex flex-wrap m-auto shadow-sm p-4 cursor-pointer bg-skyblue">
            <tr class="w-[25%] m-auto">
                <th>USERNAME</th>
            </tr>
            <tr class="w-[30%] m-auto">
                <th>EMAIL</th>
            </tr>
            <tr class="w-[15%] m-auto">
                <th>MAJOR</th>
            </tr>
            <tr class="w-[15%] m-auto">
                <th>STATUS</th>
            </tr>
            <tr class="w-[15%] m-auto">
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody class="w-[95%] flex flex-wrap m-auto mt-5 mb-10 p-2 border-b-2" 

        v-for:="alumni in alumnis">
                <tr class="w-[20%] m-auto flex flex-wrap">
                    <td class="w-[40%] m-1">
                        <div class="w-16 h-16 border-2 border-blue-500  rounded-full">
                            <img src="../../assets/logo.png" class="w-[50%] m-auto mt-3">
                        </div>
                    </td>
                    <td class="w-[55%] m-auto">
                        <h5 class="text-md">{{alumni.first_name + " "+ alumni.last_name}}</h5>
                    </td>
                </tr>
                <tr class="w-[35%] m-auto">
                    <td class="w-[60%] m-auto">
                        <p>{{alumni.email}}</p>
                    </td>
                </tr>
                <tr class="w-[15%] m-auto">
                    <td class="w-[100%]">
                        <h5>{{alumni.major==undefined? '?':alumni.major}}</h5>
                    </td>
                </tr>
                <tr class="w-[15%] m-auto">
                    <td class="w-[100%]">
                        <p class="text-bold" :class="alumni['status'].toLowerCase()">{{alumni.status}}</p>
                    </td>
                </tr>
                <tr class="w-[15%] m-auto">
                    <td class="w-[100%]">
                        <div @click="$emit('removeAlumni', alumni['user_id'])" class="w-[40%] bg-red-500 rounded-md cursor-pointer p-1 shadow-sm border-b">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-[30%] m-auto" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
  </form>
</template>
<script>
export default {
    props:['alumnis'],
    name:'form-list',
    data(){
        return{
            search:""
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
        }
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