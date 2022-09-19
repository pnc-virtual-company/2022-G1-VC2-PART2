<template>
    <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 md:h-full ">
        <div class="bg-white shadow-md rounded mt-18 m-auto w-[34%] z-10">
            <form class="">
                <div class="fixed bg-white w-[34%] mt-[-40px] z-10 flex justify-between items-center p-2 rounded-t border-b-[1px] border-gray-300">
                    <p></p>
                    <h1 class="text-[20px] font-semibold">Edit Details</h1>
                    <svg aria-hidden="true" class="w-5 h-5 cursor-pointer" @click="$emit('close')"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="mt-10 p-4 h-[28rem] overflow-auto">
                    <div class="mb-2">
                        <h1 class="font-semibold text-[17px]">Customize your information</h1>
                        <p class="text-[14px]">Details you select will be public</p>
                    </div>
                    <div>
                        <div class="flex justify-between py-2 items-center">
                            <h1 class="font-semibold text-[17px]">General Information</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hover:cursor-pointer">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                        </div>
                        <div class="flex mt-2">
                            <div class="w-[50%]">
                                <div class="flex items-center">
                                    <label class="switch" >
                                    <input type="checkbox" id="phone">
                                    <span class="slider round"></span>
                                    </label>
                                    <label class="ml-3" for="phone">Phone</label>
                                </div>
                                <div class="mt-3 flex items-center">
                                    <label class="switch" >
                                    <input type="checkbox" id="gender">
                                    <span class="slider round"></span>
                                    </label>
                                    <label class="ml-3" for="gender">Gender</label>
                                </div>
                            </div>
                            <div class="w-[50%]">
                                <div class="flex items-center">
                                    <label class="switch" >
                                    <input type="checkbox" id="email">
                                    <span class="slider round"></span>
                                    </label>
                                    <label class="ml-3" for="email">Email</label>
                                </div>
                                <div class="mt-3 flex items-center">
                                    <label class="switch" >
                                    <input type="checkbox" id="major">
                                    <span class="slider round"></span>
                                    </label>
                                    <label class="ml-3" for="major">Major</label>
                                </div>
                            </div>

                        </div>   
                    </div>
                    <div class="mt-3">
                        <div class="flex justify-between py-2 items-center">
                            <h1 class="font-semibold text-[17px]">Work Experiences</h1>
                            <div class="flex items-center">
                                <label class="switch" >
                                <input type="checkbox">
                                <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="flex mt-2 text-blue-500 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-white border-[1px] border-blue-500 rounded-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <p class="ml-3">Add new work experience</p>
                        </div>
                        <div class=" ml-2">
                            <div v-for="experience of experiences" :key="experience" class="flex items-center justify-between mt-2">
                                <div class="bg-black w-2 h-2 rounded-full"></div>
                                <div class="w-[94%] flex justify-between">
                                    <span>{{experience.position}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hover:cursor-pointer">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex justify-between py-2 items-center">
                            <h1 class="font-semibold text-[17px]">Education Background</h1>
                            <div class="flex items-center">
                                <label class="switch" >
                                <input type="checkbox">
                                <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="flex mt-2 text-blue-500 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-white border-[1px] border-blue-500 rounded-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <p class="ml-3">Add new Education background</p>
                        </div>
                        <div class=" ml-2">
                            <div v-for="ed of edu" :key="ed" class="flex items-center justify-between mt-2">
                                <div class="bg-black w-2 h-2 rounded-full"></div>
                                <div class="w-[94%] flex justify-between">
                                    <span>{{ed.major}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hover:cursor-pointer">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex justify-between py-2 items-center">
                            <h1 class="font-semibold text-[17px]">Skills</h1>
                            <div class="flex items-center">
                                <label class="switch" >
                                <input type="checkbox">
                                <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="flex mt-2 text-blue-500 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-white border-[1px] border-blue-500 rounded-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <p class="ml-3">Add new skill</p>
                        </div>
                    </div>
                </div>
                <div class="flex mb-3">
                    <div class="flex justify-end w-full ">
                        <button @click="$emit('close')"
                            class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-[2px] px-6  rounded focus:outline-none focus:shadow-outline"
                            type="button"> 
                            Cancel
                        </button>
                        <button
                            class="bg-skyblue hover:bg-[#23afda] mx-2 text-white px-8 py-[2px] rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import axios from '../../axios-http'
export default {
    emits: [],
    props: {
        'user_id': Number,
    },
    data() {
        return {
            experiences: [],
            edu: [],
        }
    },
    methods: {
        getAlumniExperiences(){
            axios.get('workexperience/' + this.user_id).then(res => {
                this.experiences = res.data
            });
        },
        getAlumniEdu(){
            axios.get('alumniEdu/'+this.user_id).then(res => {
                this.edu = res.data
            });
        },
    },
    watch: {
        user_id() {
            this.getAlumniExperiences();
            this.getAlumniEdu();
        },
    },
    created() {
        if (this.user_id) {
            this.getAlumniExperiences();
            this.getAlumniEdu();
        }
    }

}
</script>

<style scoped>
.switch {
  position: relative;
  display: inline-block;
  width: 36px;
  height: 18px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 14px;
  width: 14px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(18px);
  -ms-transform: translateX(18px);
  transform: translateX(18px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>