<template>
    <div class="bg-blue-200 p-3 rounded mt-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg"><slot></slot></h1>
            <div @click="$emit('formInputStatus', 'Add')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shadow bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
        </div>
        <div v-if="edu">
            <edu-card v-for="ed of edu" :key="ed" :image="imgEdu">
                <h1 class="font-semibold">{{ed.school}}</h1>
                <p class="text-sm leading-3">{{ed.degree}}, {{ed.major}}</p>
                <p class="text-[13px] font-medium">{{ed.start_year}} - {{ed.end_year}}</p>
            </edu-card>
        </div>
        <div v-if="experiences">
            <edu-card v-for="(experience, i) in experiences" 
            :key="experience" :image="imgExper" 
            @click="$emit('cardEditor', {status:'Edit', index:i})">
                <h1 class="font-semibold">{{experience.position}}</h1>
                <p class="text-sm leading-3">{{experience.company_name}}</p>
                <p class="text-[13px] font-medium">{{experience.start_year}} - {{experience.end_year}}</p>
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
    props: ['edu', 'experiences'],
    data(){
        return {
            imgEdu: 'https://previews.123rf.com/images/anthonycz/anthonycz1612/anthonycz161200005/68815871-school-vector-icon-isolated-building-on-white-background.jpg',
            imgExper: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC',
            
        }
    }
};
</script>

<style>

</style>