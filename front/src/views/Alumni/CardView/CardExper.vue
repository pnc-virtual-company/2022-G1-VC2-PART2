<template>
    <div class="border-[2px] border-skyblue p-3 rounded mt-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg">Experiences</h1>
            <div @click="$emit('clickPopUp', 'Add')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer shadow bg-skyblue text-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
        </div>
        <div v-for:="(experience, i) in AlumniExper"  class="flex justify-between mt-2 p-2 border-b-[1px] border-[#a9aaaaa3]">
            <div class="flex items-center">
                <div class="w-16 h-16">
                    <img class="w-16 h-16 rounded-full border-[1px] border-gray-400 object-cover" :src="imgExper" alt="">
                </div>
                <div class="ml-4">
                    <h1 class="font-semibold">{{experience.position}}</h1>
                    <p class="text-sm leading-3">{{experience.name}}</p>
                    <p class="text-[13px] font-medium">{{experience.start_month+'/'+ experience.start_year}} - {{experience.end_month==null? experience.end_year:experience.end_month+'/'+  experience.end_year}}</p>
                </div>
            </div>
            <div>
                <svg @click="$emit('editor', experience)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:font-lg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </div>
        </div>
        <div v-if="experiences.length > 2" class="text-center mt-2">
            <span v-if="!isMore" @click="isShow=true; isMore=true" class="font-semibold hover:cursor-pointer">show more</span>
            <span v-if="isMore" @click="isShow=false; isMore=false" class="font-semibold hover:cursor-pointer">show less</span>
        </div>
        <div v-else-if="experiences.length == 0" class="text-center mt-2">
            <span class="text-[14px] text-gray-500">No Work experience !! Please add your work background</span>
        </div>
    </div>      
</template>

<script>
export default {

    props: ['experiences'],
    data(){
        return {
            imgExper: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC',
            isShow: false,
            isMore: false,
        }
    },
    computed: {
        AlumniExper() {
            if(this.experiences && this.isShow) {
                return this.experiences;
            }else {
                return this.experiences.slice(0,2)
            }
        }
    },
};
</script>
