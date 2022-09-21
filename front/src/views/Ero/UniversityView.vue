<template>
<div class="mt-5 " >
    <table class="w-[60%] m-auto mt-5">
        <thead>
            <tr class="h-14 w-full bg-skyblue">
                <th class="text-center w-[40%]">UNIVERSITY NAME</th>
                <th class="text-center w-[30%]">LOCATION</th>
                <th class="text-center w-[30%]">ACTION</th>
            </tr>
        </thead>
        <tbody v-if="universities.length > 0" class="w-full" >
            <tr v-for:="university in universities" class="border-b-[1px] border-gray-400 bg-gray-300">
                <td class="text-center">
                    <div class="flex items-center space-x-4 p-2 ml-8">
                        <img class="w-14 h-14 border-[1px] border-skyblue rounded-full object-cover" :src="'http://127.0.0.1:8000/images/profile/'+ university.profile" >
                        <p :class="{'truncate w-38 hover:whitespace-pre-wrap  hover:absolute hover:font-normal  hover:p-3 hover:rounded hover:w-3/12':university.name.length > 16}">{{university.name}}</p>
                    </div>
                </td>
                <td class="text-center">
                    {{university.address}}
                </td>
                <td class="text-center">
                    <button @click ="removeUniversity(university.id)"  class= " bg-red-500 hover:bg-red-600 shadow  rounded px-5 py-2 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            </tr>
        </tbody>
        <tbody v-if="universities.length <= 0">
            <tr class="bg-gray-300">
                <td colspan="5" class="p-2 text-center">
                    <img class="w-32 m-auto mt-3" src="./../../assets/notfound.png" alt="Image not found">
                    <p class="mb-5">No companies found!</p>
                </td>
            </tr>
        </tbody>
    </table>
 </div>
</template>

<script>
import axios from '../../axios-http'
export default {
    data(){
        return {
           universities:[],
        }
    },
    methods:{
        removeUniversity(id){
            swal({
                title: "Are you sure?",
          text: "You want to remove this university !!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                axios.delete('university/'+id);
                this.getUniversity();
                swal("Your skill has been removed !!", {
                    icon: "success",
                });
          } 
        });
        },
        getUniversity(){
            axios.get('universities').then((res)=>{
                this.universities = res.data;
            })
        }
    },
    mounted(){
        this.getUniversity();
    }
}
</script>