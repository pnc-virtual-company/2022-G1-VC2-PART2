<template>
    <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full">
        <div class="modal bg-white h-auto shadow-md rounded p-5 mt-2 mb-10 m-auto w-[40%] z-10">
            <h4 class="font-bold text-center">Add Wrok experience</h4>
            <div v-if="companies!=null" class="w-[100%] my-2 flex items-center p-2">
                <label class="mb-2 w-[12rem] text-start text-sm font-bold">Company Name: </label>
                <select v-model="companyId" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue">
                    <option selected disabled class="text-gray-900">Choose a company</option>
                    <option v-for:= "company of companies" :value="company.id">{{company.name}}</option>
                </select>
            </div>
            <div class="w-[100%] flex my-2 items-center p-2">
                <label class="mb-2 w-[12rem] text-start text-sm font-bold">Position: </label>
                <input v-model="position" type="text" placeholder="You position" class="block p-2 w-full outline-none bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue">
            </div>
            
            <div class="date flex justify-between my-2 p-0">
                <div class="w-[100%] mx-2 text-start">
                <label class="mb-2 w-[10rem] text-start text-sm font-bold">Start date: </label>
                <input v-model="start_year" type="date" class="block p-2 w-full outline-none text-gray-900 bg-gray-300 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue">
                </div>
                <div class="w-[100%] mx-2 text-start">
                <label class="mb-2 w-[10rem] text-start text-sm font-bold">End date: </label>
                <input v-model="end_year" type="date" class="block p-2 w-full outline-none text-gray-900 bg-gray-300 rounded-sm border border-gray-300 sm:text-xs focus:ring-skyblue">
            </div>
        </div>
        <error class="text-center" v-if="messError!=null">{{messError}}</error>
            <div class="btn-controller flex justify-end">
                <button @click="$emit('formInputStatus', null)" class="bg-orange text-white font-bold py-1 mx-2 px-4 rounded">
                    Cancel
                </button>
                <button @click="addWorkExper" class=" bg-skyblue hover:bg-blue-700 text-white font-bold py-1 mx-2 px-4 rounded">
                    Add
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import error from "../../../components/Widget/ErrorView.vue"
export default({
    components:{error,},
    props:["companies"],
    data(){
        return {
            companyId: "",
            position:"",
            start_year: "",
            end_year: "",
            messError: null,
        }
    },
    methods:{
        addWorkExper(){
            this.messError=null;
            if(this.companyId!="" && this.position!="" && this.start_year!="" && this.end_year!=""){
                let workExper={
                    company_id:this.companyId,
                    position:this.position,
                    start_year:this.start_year,
                    end_year:this.end_year
                }
                this.$emit("addAlumniExper",workExper);
                this.$emit('formInputStatus', null)
            }else {
                this.messError="Your input is invalid, please check your input!!"
            }
        }
        
    }
})
</script>
