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
            <listAlumni class="w-[80%] m-auto mt-3"
            :countAlumnis="dataAlumnis"
            @matchAlumni="displayAlumni"
            @searchAlumni="queryAlumni"
            @removeAlumni="removeAlumni"
            :alumnis="filterAlumnis"
            />
        </div>
        <div v-else class="text-center mt-4">
            <EroMagement></EroMagement>
        </div>
    </section>
</template>
<script>
    import swal from 'sweetalert';
    import EroMagement from "../../components/Manage/EroManagement.vue";
    import listAlumni from '../../components/Manage/ListAlumnis.vue'
    import axios from "../../axios-http"
    export default{
        components:{
            EroMagement,
            listAlumni,
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
                text: "You want to remove this alumni !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('removeUser/'+id).then(() => {
                        this.getListAlumni()
                        swal("removed !", "You have been removed alumni !", "success");
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