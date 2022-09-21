<template>
    <section class="">
        <div class="flex justify-between">
            <p></p>
            <div class="flex">
                <p @click="isActive=0" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isActive == 0}">ALUMNI</p>
                <p @click="isActive=1" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isActive == 1}">COMPANY</p>
                <p @click="isActive=2" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isActive == 2}">UNIVERSITY</p>
            </div>
        </div>
        <div v-if="isActive == 0" class="text-center mt-4">
            <filterAlumni
            :countAlumnis="dataAlumnis"
            @matchAlumni="displayAlumni"/>
        <listAlumni
        @matchAlumni="displayAlumni"
        @searchAlumni="queryAlumni"
        @removeAlumni="removeAlumni"
        :alumnis="filterAlumnis"
        />
        </div>
        <company-list v-if="isActive == 1" class="text-center mt-4" />
        <h1 v-if="isActive == 2" class="text-center mt-4">school list</h1>
    </section>
</template>
<script>
import Company from './EroView.vue'
import listAlumni from '../../components/Manage/ListAlumnis.vue'
import filterAlumni from '../../components/Manage/Alumnicardstatus.vue'
import axios from "../../axios-http"
export default{
    components:{
        'company-list': Company,
        listAlumni,
        filterAlumni
    },
    data(){
        return {
            isActive: 0,
            dataAlumnis:[],
            filterAlumnis:[],
        }
    },
    methods:{
        getListAlumni(){
            axios.get('userAlumni').then((res)=>{
                this.dataAlumnis=res.data
                this.filterAlumnis=res.data
            })
        },
        removeAlumni(id){
            axios.delete('removeAlumni/'+id).then((res )=> {
                this.getListAlumni()});
        },
        displayAlumni(status){
            if(status.toLowerCase()=='all'){
                this.filterAlumnis=this.dataAlumnis
            }else{
                this.filterAlumnis=this.dataAlumnis.filter(match => match['status'].toLowerCase()==status.toLowerCase());
            }
        },
        queryAlumni(value){
            this.filterAlumnis=this.dataAlumnis.filter((key) =>{
                let alumni = key.first_name + key.last_name + key.email + key.major + key.status
                return alumni.toLowerCase().includes(value.toLowerCase());
            });
        }
    },
    mounted(){
        this.getListAlumni()
    }
}
</script>