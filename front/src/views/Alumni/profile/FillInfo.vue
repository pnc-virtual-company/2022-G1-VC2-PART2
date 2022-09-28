<template>
    <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full ">
        <div class="modal bg-white h-auto shadow-md rounded  mt-2 mb-10 m-auto w-[38%] z-10">
            <form class="">
                <div class="flex justify-center items-center p-2 rounded-t bg-skyblue text-white">
                    <h1 class="text-[20px] font-semibold">Fill Info</h1>
                </div>
                <div class="px-4 py-1">
                    <div class="mb-1 flex">
                    <div class="w-[49%] m-1">
                        <label class="block text-gray-700 text-[15px] mb-1">
                            First Name <span class="text-red-600">*</span>
                        </label>
                        <input v-model="firstname"
                            class="block appearance-none w-full bg-white border-[1px] border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight  focus:shadow-outline focus:outline-[#22bbea]"
                            :class="{ 'border-red-500 bg-red-100': is_firstname}"
                            type="text" placeholder="First name...">
                    </div>
                    <div class="w-[49%] m-1">
                        <label class="block text-gray-700 text-[15px] mb-1">
                            Last Name <span class="text-red-600">*</span>
                        </label>
                        <input v-model="lastname"
                            class="block appearance-none w-full bg-white border-[1px] border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight  focus:shadow-outline focus:outline-[#22bbea]"
                            :class="{ 'border-red-500 bg-red-100': is_lastname}"
                            type="text" placeholder="Last name...">
                    </div>
                </div>

                <div class="text-red-500 text-sm mb-2 m-1">{{sms_erorr_phone}}</div>
                <div class=" flex">
                    <div class="w-[50%] m-1 relative">
                        <label class="block text-gray-700 text-[15px] mb-1">Batch <span class="text-red-600">*</span></label>
                        <div class="inline-block relative w-full">
                            <select v-model="batch" class="block appearance-none w-full bg-white border-[1px] border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight  focus:shadow-outline focus:outline-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_batch}">
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>                        
                    </div>
                    <div class="w-[50%] m-1 relative">
                        <label class="block text-gray-700 text-[15px] mb-1">Major <span class="text-red-600">*</span></label>
                        <div class="inline-block relative w-full">
                            <select v-model="major" class="block appearance-none w-full bg-white border-[1px] border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight  focus:shadow-outline focus:outline-[#22bbea]" :class="{ 'border-red-500 bg-red-100': is_major}">
                                <option value="WEB">WEB</option>
                                <option value="SNA">SNA</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="mb-1 m-1 relative">
                    <label class="block text-gray-700 text-[15px]  mb-1" for="number">
                        Phone <span class="text-red-600">*</span>
                    </label>
                    <input v-model="phone"
                        class="block appearance-none w-full bg-white border-[1px] border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight  focus:shadow-outline focus:outline-[#22bbea]"
                        :class="{ 'border-red-500 bg-red-100': is_phone}"
                        id="phone" type="tel" maxlength="10" placeholder="Tel..." required>
                </div>
                <div class="w-[50%] m-1 mt-3">
                    <label  class="block text-gray-700 text-[15px] mb-1">Gender <span class="text-red-600">*</span></label>
                    <div class="flex">
                        <div class="flex items-center mb-4 ">
                            <input v-model="gender" type="radio" value="M" :class="{ 'border-red-500 bg-red-100': is_gender}"
                                class="w-4 h-4 bg-gray-100 border-gray-300   dark:ring-offset-gray-800 focus:ring-2" id="m">
                            <label 
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="m"
                                >Male</label>
                        </div>
                        <div class="flex items-center mb-4 ml-2">
                            <input v-model="gender"  type="radio" id="f" value="F" :class="{ 'border-red-500 bg-red-100': is_gender}"
                                class="w-4 h-4 bg-gray-100 border-gray-300   dark:ring-offset-gray-800 focus:ring-2">
                            <label
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="f">Female</label>
                        </div>
                        <div class="flex items-center mb-4 ml-2">
                            <input v-model="gender"  type="radio" id="others" value="Others" :class="{ 'border-red-500 bg-red-100': is_gender}"
                                class="w-4 h-4 bg-gray-100 border-gray-300   dark:ring-offset-gray-800 focus:ring-2">
                            <label
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="others">Others</label>
                        </div>
                    </div>
                </div>
                
                <div class="flex mb-3">
                    <button @click="fillInfo"
                        class="bg-skyblue hover:bg-[#23afda] text-white py-2 px-10 rounded focus:outline-none focus:shadow-outline w-full"
                        type="button">
                        Submit
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import axios from '../../../axios-http'
export default {
    emits: ['already-fill'],
    data() {
        return {
            firstname: '',
            lastname: '',
            phone: '',
            batch: '',
            gender: '',
            major: '',
            is_firstname: false,
            is_lastname: false,
            is_phone: false,
            is_batch: false,
            is_gender: false,
            is_major: false,
            sms_erorr_phone: '',
        }
    },
    methods: {
        fillInfo() {
            if (this.validate()) {
                if (this.phone.match(/^[0]\d{9}$/) || this.phone.match(/^[0]\d{8}$/)) {
                    let alumni = {
                        'first_name': this.firstname,
                        'last_name': this.lastname,
                        'phone': this.phone,
                        'batch': this.batch,
                        'gender': this.gender,
                        'major': this.major
                    }
                    axios.put('/alumniInfo/' + this.$store.state.userId, alumni).then(res=> {
                        this.$emit('already-fill');
                        this.$emit('update-nav');
                    })
                }else {
                    this.is_phone = true;
                    this.sms_erorr_phone = 'This phone number is not valid';
                }

            }
        },
        validate() {
            this.is_firstname = false;
            if(this.firstname.trim() == '') {
                this.is_firstname = true;
            }
            this.is_lastname = false;
            if(this.lastname.trim() == '') {
                this.is_lastname = true;
            }

            this.is_phone = false;
            this.sms_erorr_phone = '';
            if(this.phone.trim() == '') {
                this.is_phone = true;
            }
            this.is_batch = false;
            if(this.batch.trim() == '') {
                this.is_batch = true;
            }
            this.is_gender = false;
            if(this.gender.trim() == '') {
                this.is_gender = true;
            }
            this.is_major = false;
            if(this.major.trim() == '') {
                this.is_major = true;
            }
            let message = true;
            if (this.is_firstname || this.is_lastname || this.is_phone || this.is_batch || this.is_gender || this.is_major) {
                message = false;
            }
            return message;
        }
    }

}
</script>