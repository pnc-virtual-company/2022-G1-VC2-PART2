<template>
    <section class="">
        <div class="flex justify-between">
            <p></p>
            <div class="flex">
                <p @click="isActive=0" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isActive == 0}">ALUMNI</p>
                <p @click="isActive=1" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isActive == 1}">COMPANY</p>
                <p @click="isActive=2" class="p-4 font-semibold hover:cursor-pointer" :class="{'text-orange border-b-[2px] border-orange':isActive == 2}">UNIVERSITY</p>
            </div>
            <p></p>
        </div>
        <h1 v-if="isActive == 0" class="text-center mt-4">alumni list</h1>
        <company-list v-if="isActive == 1" class="text-center mt-4" />
        <h1 v-if="isActive == 2" class="text-center mt-4">school list</h1>
    </section>
</template>
<script>
import Company from './EroView.vue'
export default{
    components:{
        'company-list': Company,
    },
    data(){
        return {
            isActive: 0,
        }
    }

}
</script>