<template>
<div class="mt-5 " >
    <table class="w-[60%] m-auto mt-5">
        <thead>
            <tr class="h-14 w-full bg-skyblue">
                <th class="text-center w-[40%]">COMPANY NAME</th>
                <th class="text-center w-[30%]">LOCATION</th>
                <th class="text-center w-[30%]">ACTION</th>
            </tr>
        </thead>
        <tbody v-if="companies.length > 0" class="w-full" >
            <tr v-for:="company in companies" class="border-b-[1px] border-gray-400 bg-gray-300">
                <td class="text-center">
                    <div class="flex items-center space-x-4 p-2 ml-8">
                        <img class="w-14 h-14 border-[1px] border-skyblue rounded-full object-cover" :src="'http://127.0.0.1:8000/images/profile/'+ company.profile" >
                        <p :class="{'truncate w-38 hover:whitespace-pre-wrap  hover:absolute hover:font-normal  hover:p-3 hover:rounded hover:w-3/12':company.name.length > 16}">{{company.name}}</p>
                    </div>
                </td>
                <td class="text-center">
                    {{company.address}}
                </td>
                <td class="text-center">
                    <div @click ="removeCompany(company.id)" class="bg-red-500 w-12 rounded text-center m-auto py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                </td>
            </tr>
        </tbody>
        <tbody v-if="companies.length <= 0">
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
           companies:[],
        }
    },
    methods:{
        removeCompany(company){
            swal({
                title: "Are you sure?",
          text: "You want to remove this Company !!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                axios.delete('companies/'+company);
                this.getCompany();
                swal("Your skill has been removed !!", {
                    icon: "success",
                });
          } 
        });
        },
        getCompany(){
            axios.get('companies').then((response)=>{
                this.companies = response.data;
            })
        }
    },
    mounted(){
        this.getCompany();
    }
}
</script>