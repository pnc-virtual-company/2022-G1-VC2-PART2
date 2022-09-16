<template>
    <section>
        <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full">
        <div class="modal bg-white h-auto shadow-md rounded p-5 mt-2 mb-10 m-auto w-[30rem] z-10">
            <h4 class="font-bold text-center">Edit Wrok experience</h4>
            <div v-if="companies!=null" class="w-[100%] my-2 flex items-center p-2">
                <label class="mb-2 w-[12rem] text-start text-sm font-bold">Company Name: </label>
                <select v-model="companyId" class="block p-2 w-full outline-none text-gray-900 bg-gray-100 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue" :class="msError['require_error']?'border-red-200':''">
                    <option value="null" disabled class="text-gray-900">Choose a company</option>
                    <option v-for:= "company of companies" :value="company.id">{{company.name}}</option>
                </select>
            </div>
            <div class="w-[100%] flex my-2 items-center p-2">
                <label class="mb-2 w-[12rem] text-start text-sm font-bold">Position: </label>
                <input v-model="position" type="text" placeholder="require*" class="block font-xl p-2 w-full outline-none text-gray-900 bg-gray-100 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue" :class="msError['require_error']?'border-red-200':''">
            </div>
            <error class="text-xs relative ml-[32%] -mt-2" v-if="msError['pst_error']">{{msError['pst_error']}}</error>

            <div class="flex items-center ml-2 my-4">
                <input id="default-checkbox" type="checkbox" v-model='ischeckboxed' class="w-4 h-4 text-green-500 bg-gray-100 rounded border-gray-300">
                <label for="default-checkbox" class="ml-4 text-sm font-medium text-gray-900">I am current working</label>
            </div>
            <div class="start-date">
                <label class="mb-2 ml-2 w-[12rem] text-start text-sm font-bold">Start date</label>
                <div class="date flex justify-between my-2 p-0">
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="start_month" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue" :class="msError['require_error']?'border-red-200':''">
                            <option value="" disabled>Month</option>
                            <option v-for:= "month of months" :value="month">{{month}}</option>
                        </select>
                    </div>
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="start_year" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue" :class="msError['require_error']?'border-red-200':''">
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
                        <select v-model="end_month" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue" :class="msError['require_error']?'border-red-200':''">
                            <option value="" disabled>Month</option>
                            <option v-for:= "month of months" :value="month">{{month}}</option>
                        </select>
                    </div>
                    <div class="w-[100%] mx-2 text-start">
                        <select v-model="end_year" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue" :class="msError['require_error']?'border-red-200':''">
                            <option value="PRESENT" disabled>Year</option>
                            <option v-for:= "year of years" :value="year">{{year}}</option>
                        </select>
                    </div>
                </div>
            </div>            
            <div class="btn-controller flex justify-end">
                <button @click="$emit('clickPopUp', null)" class="bg-gray-500 text-white font-bold py-1 mx-2 px-4 rounded">
                    Cancel
                </button>
                <button @click="saveEdit" class=" bg-skyblue hover:bg-blue-700 text-white font-bold py-1 mx-2 px-4 rounded">
                    Save
                </button>
            </div>
        </div>
    </div>
    </section>
</template>
<script>
import error from "../../../components/Widget/ErrorView.vue"
export default({
    components:{error,},
    props:["experience", "companies"],
    data(){
        return {
            start_month:this.experience['start_month'],
            start_year:this.experience['start_year'],
            end_month:this.experience['end_month']?this.experience['end_month']:"",
            end_year:this.experience['end_year'],
            months:  ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            years:[2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016,2017, 2018,2019,2019,2020, 2021],
            companyId: this.experience['company_id'],
            position:this.experience['position'],
            msError: {},
            ischeckboxed:this.experience['end_year']=='PRESENT'?true:false,
        }
    },
    methods:{
        saveEdit(){
            this.messError=null;
            let workExper={}
            if(this.start_year !="" && this.start_month !="" && 
            this.ischeckboxed && this.msError['pst_error']==''){
                workExper={
                    company_id:this.companyId,
                    position:this.position,
                    start_month:this.start_month,
                    start_year:this.start_year,
                    end_year:'PRESENT'
                }
                this.$emit("edit-workExper",workExper);
                this.$emit('clickPopUp', null)
            }else if(this.companyId !="" && this.position !="" 
            && this.start_year !="" && this.end_year !=""&&
            this.start_month !="" && this.end_month !="" && this.msError['pst_error']=='' ){
                workExper={
                    company_id:this.companyId,
                    position:this.position,
                    start_year:this.start_year,
                    end_year:this.end_year,
                    start_month:this.start_month,
                    end_month:this.end_month,
                }
                this.$emit("edit-workExper",workExper);
                this.$emit('clickPopUp', null)
            }else{this.msError['require_error']='please check your require*'}
        },
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
