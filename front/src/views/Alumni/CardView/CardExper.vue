<template>
    <div :class="{'border-[2px] border-skyblue p-3 rounded mt-4': role=='alumni'}">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg">Experiences</h1>
            <div v-if="role=='alumni'" @click="$emit('clickPopUp', 'Add')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer shadow bg-skyblue text-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
        </div>
        <div>
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
                    <svg v-if="role=='alumni'" id="i" @click="isClick= true, id = i" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:font-lg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <div v-if="isClick && id == i" class="absolute bg-slate-300 rounded mt-[-30px] ml-[30px] text-[14px]"  v-click-outside="onClickOutSide">
                        <p class="flex items-center hover:cursor-pointer hover:bg-skyblue py-1 px-3 hover:text-white hover:rounded-bl hover:rounded-br" @click="$emit('editor', experience), isClick=false">
                            <span class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </span>
                            Edit
                        </p>
                        <p class="flex items-center hover:cursor-pointer hover:bg-red-500 py-1 px-3 hover:text-white hover:rounded-tr hover:rounded-tl">
                            <span class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </span>
                            Delete
                        </p>
                    </div>
                </div>
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

    props: ['experiences', 'role'],
    data(){
        return {
            imgExper: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC',
            isShow: false,
            isMore: false,
            isClick: false,
            id: null,
        }
    },
    methods: {
        onClickOutSide() {
            this.isClick = !this.isClick;
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
