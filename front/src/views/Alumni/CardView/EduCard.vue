<template>
    <div class="border-[2px] border-skyblue p-3 rounded mt-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg">Education</h1>
            <div @click="$emit('is-add-edu')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer shadow bg-skyblue text-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
        </div>
        <div v-for:="(education, i) in educations"  class="flex justify-between mt-2 p-2 border-b-[1px] border-[#a9aaaaa3]">
            <div class="flex items-center">
                <div class="w-16 h-16">
                    <img class="w-16 h-16 rounded-full border-[1px] border-gray-400 object-cover" :src="imgEdu" alt="">
                </div>
                <div class="ml-4">
                    <h1 class="font-semibold">{{education.degree}}</h1>
                    <p class="text-sm leading-3 font-medium">{{education.name}}</p>
                    <p class="text-[13px] ">{{education.start_year}} - {{education.end_year}}</p>
                </div>
            </div>
            <div>
                <svg @click="$emit('isEdit-edu',education)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:cursor-pointer hover:font-lg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </div>
        </div>
        <div class="text-center mt-2">
            <span v-if="!isMore" @click="isShow=true; isMore=true" class="font-semibold hover:cursor-pointer">show more</span>
            <span v-if="isMore" @click="isShow=false; isMore=false" class="font-semibold hover:cursor-pointer">show less</span>
        </div>
    
    </div>      
</template>

<script>
export default {

    props: ['edu'],
    data(){
        return {
            imgEdu: 'https://previews.123rf.com/images/anthonycz/anthonycz1612/anthonycz161200005/68815871-school-vector-icon-isolated-building-on-white-background.jpg',
            isShow: false,
            isMore: false,
        }
    },
    computed: {
        educations() {
            if(this.edu && this.isShow) {
                return this.edu;
            }else {
                return this.edu.slice(0,2)
            }
        }
    },
};
</script>
