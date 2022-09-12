<template>
    <div class="w-[90%] m-auto">
        <div >
            <div>
                <div class="w-full">
                    <img class="w-full h-52 border border-1 border-gray-300" src="https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?w=900&t=st=1662803337~exp=1662803937~hmac=cf60bab2657205cd3fee65a76ce66d234eb8ec4d516ec6f7c62257a2cfefd8d5" alt="">
                </div>
                <div class="flex justify-end mt-[-40px]">
                    <div class="flex bg-gray-200 px-4 py-1 rounded-md mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        <p class="ml-2 text-gray-500">Edit cover photo</p>
                    </div>
                </div>
            </div>
            <div class="absolute ml-24 text-center">
                <div class="flex">
                    <div class="w-40">
                        <img class=" rounded-full h-40 mt-[-130px]  border border-b-1 border-gray-400" src="https://play-lh.googleusercontent.com/qm3XcIvP6BOFnS_bK0Jjey7od3adNl3d_c7JyzyNmMUs1yvbiXoWfyhCaP8NQG9CUwE=w526-h296-rw" alt="">
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 bg-gray-300 p-1 rounded-full ml-[-40px] mt-[-16px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                    </div>
                </div>
                <h1 class="font-bold text-xl">Sreymao Vorn</h1>
            </div>
        </div>
        <div class="flex justify-between mt-8 items-start">
            <div class="w-[32%] bg-blue-200 p-3 rounded mt-14">
                <CardSkills />
            </div>
            <div class="w-[64%]">
                <CardInfo :user="user" @getData="getUser" />
                <CardExper :edu="edu">Education Background</CardExper>
                <CardExper :experiences="experiences">Work Experiences</CardExper>
            </div>
        </div>
    </div>

</template>

<script>
import axios from '../../axios-http'
import CardInfo from "../CardInfo.vue"
import CardSkills from "../skills/CardSkills.vue"
import CardExper from "../CardExper.vue"
export default {
    components:{
        CardInfo,
        CardSkills,
        CardExper
    },
    data() {
        return {
            user: {},
            edu: [
                {school: 'Passerelles Numeriques Cambodia', degree: "Associat's degree", major: 'Information Technology', start_year: 2020, end_year: 2022, src: 'https://previews.123rf.com/images/anthonycz/anthonycz1612/anthonycz161200005/68815871-school-vector-icon-isolated-building-on-white-background.jpg'},
                {school: 'Passerelles Numeriques Cambodia', degree: "Associat's degree", major: 'Information Technology', start_year: 2020, end_year: 2022, src: 'https://previews.123rf.com/images/anthonycz/anthonycz1612/anthonycz161200005/68815871-school-vector-icon-isolated-building-on-white-background.jpg'},
            ],
            experiences: [
                {company_name: 'Sourceamax Asia', position: 'Front End Developer', start_year: 2020, end_year: 2020, src: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC'},
                {company_name: 'Sourceamax Asia', position: 'Front End Developer', start_year: 2020, end_year: 2020, src: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC'},
            ]
        }
    },
    methods:{
        getUser() {
            axios.get('/alumniuser/1').then(res=> {
                this.user = res.data;
            })
        }
    },

    mounted() {
        this.getUser();
    },
};
</script>

<style></style>
