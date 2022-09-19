<template>
    <section>
        <AlumniStatus
        @matchAlumni="displayAlumni"
        
        />
        <Listalumni
        @matchAlumni="displayAlumni"
        @searchAlumni="queryAlumni"
        :alumnis="alumnis"
        />

    </section>
</template>

<script>
import AlumniStatus from '../../../components/Manage/Alumnicardstatus.vue'
import Listalumni from '../../../components/Manage/ListAlumnis.vue'
    export default {
        components:{
            AlumniStatus,
            Listalumni
            },
       data(){
        return {
            listAlumnis:[
                {name:'Tom',email:'kimky@gmail.com',major:'WEP-B 2022',status:'active'},
                {name:'kimky',email:'kimky@gmail.com',major:'WEP-B 2022',status:'invite'},
                {name:'Theavy',email:'kimky@gmail.com',major:'WEP-B 2022',status:'pedding'},
                {name:'kimky',email:'kimky@gmail.com',major:'WEP-B 2022',status:'invite'},
                {name:'kimky',email:'kimky@gmail.com',major:'WEP-B 2022',status:'active'},
            ],
            alumnis:[], 
        }

    },
      methods:{
        displayAlumni(status){
            if(status.toLowerCase()=='all'){
                this.alumnis=this.listAlumnis
            }else{
                this.alumnis=this.listAlumnis.filter(match => match['status'].toLowerCase()==status.toLowerCase());
            }
        },

        queryAlumni(value){
            this.alumnis=this.listAlumnis
            .filter((key) => key['name'].toLowerCase().includes(value.toLowerCase()))
            // .filter((key) => key['status'].toLowerCase().includes(value.toLowerCase()))
            // .filter((key) => key['major'].toLowerCase().includes(value.toLowerCase()));

        }
    },

    mounted(){
        this.alumnis=this.listAlumnis;
    }
}
</script>