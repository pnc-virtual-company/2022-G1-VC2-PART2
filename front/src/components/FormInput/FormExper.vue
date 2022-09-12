<template>
    <div class="contianer bg-[#000000b9] absolute w-[100%] h-[40rem] flex items-center">
        <div class="form-edit bg-white w-[40%] m-auto mb-1rem shadow-sm shadow-gray-400 rounded-md p-6">
            <h4 class="font-bold text-center">Add Wrok experience</h4>
            <div class="w-[100%] my-2 flex items-center p-2">
                <label class="mb-2 w-[12rem] text-start text-sm font-bold">Company Name: </label>
                <select v-model="companyname" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
                    <option selected="" disabled class="text-gray-900">Choose a company</option>
                    <option value="Sourcemax">Sourcemax</option>
                    <option value="Z1 Solution">Z1 Solution</option>
                    <option value="Zination">Zination</option>
                    <option value="Camsolution">Camsolution</option>
                </select>
            </div>
            <div class="w-[100%] flex my-2 items-center p-2">
                <label class="mb-2 w-[12rem] text-start text-sm font-bold">Position: </label>
                <input v-model="position" type="text" placeholder="You position" class="block p-2 w-full outline-none bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
            </div>
            
            <div class="date flex justify-between my-2 p-0">
                <div class="w-[100%] mx-2 text-start">
                <label class="mb-2 w-[10rem] text-start text-sm font-bold">Start date: </label>
                <input v-model="start_year" type="month" class="block p-2 w-full outline-none text-gray-900 bg-gray-300 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
                </div>
                <div class="w-[100%] mx-2 text-start">
                <label class="mb-2 w-[10rem] text-start text-sm font-bold">End date: </label>
                <input v-model="end_year" type="month" class="block p-2 w-full outline-none text-gray-900 bg-gray-300 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
            </div>
        </div>
        <error class="text-center" v-if="messError!=null">{{messError}}</error>
            <div class="btn-controller flex justify-end">
                <button @click="$emit('formExper', null)" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 mx-2 px-4 rounded">
                    Cancel
                </button>
                <button @click="addWorkExper" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 mx-2 px-4 rounded">
                    Add
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import error from "../ErrorView.vue"
export default({
    components:{error,},
    props:{experience:Object},
    data(){
        return {
            companyname: "",
            position:"",
            start_year: "",
            end_year: "",
            messError: null,
        }
    },
    methods:{
        addWorkExper(){
            this.messError=null;
            if(this.companyname!="" && this.position!="" && this.start_year!="" && this.end_year!=""){
                let workExper={
                    company_name:this.companyname,
                    position:this.position,
                    start_year:this.start_year,
                    end_year:this.end_year
                }
                this.$emit("addAlumniExper",workExper);
                this.$emit('formExper', null)
            }else {
                this.messError="Your input is invalid, please check your input!!"
            }
        }
        
    }
})
</script>
