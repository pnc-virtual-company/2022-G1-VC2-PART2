<template>
    <div class="w-[90%] flex flex-wrap m-auto mt-10 border-2 border-blue-500">
        <card-header>
        <template #title_main>
            University Name
        </template>
        <template #address_main>
            Address                                               
        </template>
        <template #action_main>
            Action
        </template>
    </card-header>
    <card-body v-for:="university in universities" :university_id=university.id @remove-univer='removeUniver'>
        <template #logo>
            <img :src="'http://127.0.0.1:8000/images/profile/'+university.profile" class="w-[70%] m-auto mt-3">
        </template>
        <template #title>
            {{university.name}}
        </template>
        <template #address>
            {{university.address}}
        </template>
    </card-body>
    </div>
</template>

<script>
import axios from '../../axios-http'
import CardHeader from "./CardHeader.vue";
import CardBody from "./CardBody.vue";
export default {
    name:'card-view',
    components:{
        'card-header':CardHeader,
        'card-body':CardBody,
    },
    data(){
        return {
            universities:[],
        }
    },
    methods:{
        
        getUniversity(){
            axios.get('universities').then((response)=>{
                this.universities= response.data;
                console.log(response.data)
            })
        },
        removeUniver(id){
            axios.delete('university/'+id).then(()=>{ this.getUniversity() }) ;
        },
    },
    mounted(){
        this.getUniversity();
    }
}
</script>

