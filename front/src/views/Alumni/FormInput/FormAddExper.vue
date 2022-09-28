<template>
    <section>

    <div v-if="!isAddCompany" tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full">
        <div class="modal bg-white h-auto shadow-md rounded p-5 mt-2 mb-10 m-auto w-[30rem] z-10" v-click-outside="onClickOutside">
            <h4 class="font-bold text-center">Add Wrok experience</h4>
            <div v-if="companies!=null" class="w-[100%] items-center p-2">
                <label class="w-[12rem] text-start text-sm font-bold">Company Name: </label>
                <!-- search company -->
                <autocomplete
                :error="msError['require_error']"
                @addInput="addInput"
                :message="'Type here'"
                :items="companies"
                @selected="getIdCompany"
                @hasMatch='hasMatch'
                class="mt-4 w-[100%] bg-white">
                    <span>No Matching Company, please </span>
                    <button  class="mx-auto rounded-md text-blue-800" @click="popUp(true)">add here</button>
                </autocomplete>
            </div>
            <div class="w-[100%] items-center p-2" :class="hasMatch? 'mt-6':''">
                <label class=" w-[12rem] text-start text-sm font-bold">Position: </label>
                <input v-model="position" type="text" placeholder="require*" class="block p-2 w-full outline-none text-gray-900bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="msError['require_error']||msError['pst_error']?'border-red-400 bg-red-100':''">
            </div>
            <div class="flex items-center ml-2 my-4">
                <input id="default-checkbox" type="checkbox" v-model='ischeckboxed' class="w-4 h-4 text-green-500 bg-gray-100 rounded border-gray-300">
                <label for="default-checkbox" class="ml-4 text-sm font-medium text-gray-900">I am current working</label>
            </div>
            <div class="start-date">
                <label class="mb-2 ml-2 w-[12rem] text-start text-sm font-bold">Start date</label>
                <div class="date flex justify-between my-2 p-0">
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="start_month" class="block p-2 w-full outline-none text-gray-900bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="msError['require_error']?'border-red-400 bg-red-100':''">
                            <option value="" disabled>Month</option>
                            <option v-for:= "month of months" :value="month">{{month}}</option>
                        </select>
                    </div>
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="start_year" class="block p-2 w-full outline-none text-gray-900bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="msError['require_error']?'border-red-400 bg-red-100':''">
                            <option value="" disabled>Year</option>
                            <option v-for:= "year of years" :value="year">{{year}}</option>
                        </select>
                    </div>
                </div>
            </div>
             <div :class="ischeckboxed?'hidden':'end_date'">
                <label class="mb-2 ml-2 w-[12rem] text-start text-sm font-bold">End date</label>
                <div class="date flex justify-between my-2 p-0">
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="end_month" class="block p-2 w-full outline-none text-gray-900bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="msError['require_error']?'border-red-400 bg-red-100':''">
                            <option value="" disabled>Month</option>
                            <option v-for:= "month of months" :value="month">{{month}}</option>
                        </select>
                    </div>
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="end_year" class="block p-2 w-full outline-none text-gray-900bg-gray-50 rounded-sm border border-gray-400 sm:text-xs focus:ring-blue-500 focus:border-[#22bbea]" :class="msError['require_error']?'border-red-400 bg-red-100':''">
                            <option value="" disabled>Year</option>
                            <option v-for:= "year of years" :value="year">{{year}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btn-controller flex justify-end">
                <button @click="$emit('clickPopUp', null)" class="mr-4 hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
                <button @click="addWorkExper" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
                    Add
                </button>
            </div>
        </div>
        <!-- add company -->
    </div>
        <addcompany 
        v-else
        @add-company="addCompany"
        :name="keepValueInput"
        @popUp="popUp">
        </addcompany>
    </section>
</template>
<script>
import autocomplete from "./AutoComplete.vue"
import addcompany from "./FormAddCompany.vue"
export default({
    components:{ autocomplete, addcompany},
    props:["companies"],
    data(){
        return {
            
            start_month:'',
            start_year:'',
            end_month:'',
            end_year:'',
            months:  ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            years:[2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016,2017, 2018,2019,2019,2020, 2021, 2022],
            companyId: null,
            position:"",
            msError: {},
            ischeckboxed:false,
            isAddCompany: false,
            keepValueInput:"",
        }
    },
    methods:{
        onClickOutside () {this.$emit('clickPopUp', null)},
        hasMatch(value){return value.length},
        getIdCompany(company){this.companyId = company.id},
        addWorkExper(){
            let workExper={}
            if(this.companyId !=null && this.position !="" 
            && this.start_year !="" && this.end_year !=""&&
            this.start_month !="" && this.end_month !="" && this.msError['pst_error']==''){
                workExper={
                    company_id:this.companyId,
                    position:this.position,
                    start_year:this.start_year,
                    end_year:this.end_year,
                    start_month:this.start_month,
                    end_month:this.end_month,
                }
                this.$emit("addAlumniExper",workExper);
                this.$emit('clickPopUp', null)
            }else if(this.start_year !="" && this.start_month !="" && 
            this.ischeckboxed && this.msError['pst_error']==''){
                workExper={
                    company_id:this.companyId,
                    position:this.position,
                    start_month:this.start_month,
                    start_year:this.start_year,
                    end_year:'PRESENT'
                }
                this.$emit("addAlumniExper",workExper);
                this.$emit('clickPopUp', null)
            }else{this.msError['require_error']='Please check your require*'}
        },

        popUp(status){
            this.isAddCompany=status;
        },

        addCompany(company){
            console.log("New company : ", company);
            this.$emit('add-company', company);
            this.isAddCompany=false;
        },

        addInput(value){
            this.keepValueInput = value
        }

    },

    watch: {
        position(value){ 
        this.msError['require_error']=''
        this.position = value; 
        if(value == "default" || value == ""){this.msError['pst_error']='Your posstion require*'}
        else if(value.length>35){this.msError['pst_error']='Your posstion no longer requires*'}else{this.msError['pst_error']=''}
        },  
    },
})
</script>