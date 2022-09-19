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
        <EroMagement v-if="!isAlumni"/>
        <h1 v-if="isAlumni" class="text-center mt-4">alumni list</h1>
    </section>
</template>
<script>
    import EroMagement from "../../components/Manage/EroManagement.vue"
    export default{
        components:{
            EroMagement,
        },
        data(){
            return {
                isAlumni: true,
            }
        }

    }
</script>