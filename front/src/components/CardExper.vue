<template>
    <div class="bg-blue-200 p-3 rounded mt-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg"><slot></slot></h1>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shadow bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
        </div>
        <div v-if="edu">
            <edu-card v-for="ed of edu" :key="ed" :image="ed.src">
                <h1 class="font-semibold">{{ed.school}}</h1>
                <p class="text-sm leading-3">{{ed.degree}}, {{ed.major}}</p>
                <p class="text-[13px] font-medium">{{ed.start_year}}-{{ed.end_year}}</p>
            </edu-card>
        </div>
        <div v-if="experiences">
            <edu-card v-for="experience of experiences" :key="experience" :image="experience.src">
                <h1 class="font-semibold">{{experience.position}}</h1>
                <p class="text-sm leading-3">{{experience.company_name}}</p>
                <p class="text-[13px] font-medium">{{experience.start_year}}-{{experience.end_year}}</p>
            </edu-card>
        </div>
    </div>      
</template>

<script>
import EduCard from "./EduCard.vue"
export default {
    components:{
      'edu-card': EduCard,
    },
    props: ['edu', 'experiences']

};
</script>

<style>

</style>