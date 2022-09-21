<template>
    <section class="">
        <div class="flex justify-between">
            <p></p>
            <div class="flex">
                <p @click="isAlumni=true" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isAlumni}">ALUMNI</p>
                <p @click="isAlumni=false" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':!isAlumni}">ERO OFFICER</p>
            </div>
            <p></p>
        </div>
        <div v-if="isAlumni" class="text-center mt-4">
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
        <div v-else class="text-center mt-4">
            <h1  class="text-center mt-4">Ero list</h1>
            <EroMagement></EroMagement>
        </div>
    </section>
</template>
<script>
    import swal from 'sweetalert';
    import EroMagement from "../../components/Manage/EroManagement.vue";
    import listAlumni from '../../components/Manage/ListAlumnis.vue'
    import filterAlumni from '../../components/Manage/Alumnicardstatus.vue'
    import axios from "../../axios-http"
    export default{
        components:{
            EroMagement,
            listAlumni,
            filterAlumni
        },
        data(){
            return {
                isAlumni: true,
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
                swal({
                title: "Are you sure?",
                text: "You want to remove this work experience !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('removeAlumni/'+id).then(() => {
                        this.getListAlumni()
                        swal("removed !", "Your work experince is removed !", "success");
                    });
                } 
            });
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