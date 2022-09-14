<template>
    <section>
        <div tabindex="-1" class=" bg-[#000000b9] fixed  flex items-center z-50 md:inset-0 h-modal md:h-full ">
            <div class="modal bg-white h-auto shadow-md rounded  mt-2 mb-10 p-5 m-auto w-[40%] z-10">
                <h4 class="font-bold text-center">Edit Work Experience</h4>
                <div class="w-[100%] my-2 flex items-center p-2">
                    <label class="mb-2 w-[12rem] text-start text-sm font-bold">Company Name: </label>
                    <select v-model="company_id" class="block p-2 w-full outline-none text-gray-900 bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
                        <option selected disabled class="text-gray-900">Choose a company</option>
                        <option v-for:= "company of companies" :value="company.id">{{company.name}}</option>
                    </select>
                </div>
                
                <div class="w-[100%] flex my-2 items-center p-2">
                    <label class="mb-2 w-[12rem] text-start text-sm font-bold">Position: </label>
                    <input v-model="position" type="text" placeholder="You position" class="block p-2 w-full outline-none bg-gray-50 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
                </div>
                
                <div class="date flex justify-between my-2 p-0">
                    <div class="w-[100%] mx-2 text-start">
                    <label class="mb-2 w-[10rem] text-start text-sm font-bold">Start date: </label>
                    <input type="date" v-model="start_year" class="block p-2 w-full outline-none text-gray-900 bg-gray-300 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
                    </div>
                    <div class="w-[100%] mx-2 text-start">
                    <label class="mb-2 w-[10rem] text-start text-sm font-bold">End date: </label>
                    <input type="date" v-model="end_year" class="block p-2 w-full outline-none text-gray-900 bg-gray-300 rounded-sm border border-gray-300 sm:text-xs focus:ring-blue-500">
                </div>
            </div>
             <error class="text-center" v-if="messError!=null">{{messError}}</error>
                <!-- Using utilities: -->
                <div class="btn-controller flex justify-end">
                    <button @click="$emit('formInputStatus', null)" class="bg-[#ff9933] text-white font-bold py-1 mx-2 px-4 rounded">
                        Cancel
                    </button>
                    <button @click="saveEdit" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 mx-2 px-4 rounded">
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
            company_id: this.experience.company_id,
            position:this.experience.position,
            start_year: this.experience.start_year,
            end_year: this.experience.end_year,
            messError:null,
        }
    },
    methods:{
        saveEdit(){
            this.messError=null;
            if(this.company_id !="" && this.position !="" && this.start_year !="" && this.end_year !=""){
                let workExper={
                    company_id:this.company_id,
                    position:this.position,
                    start_year:this.start_year,
                    end_year:this.end_year
                }
                this.$emit("saveEditExper",workExper);
                this.$emit('formInputStatus', null)
            }else {
                this.messError="Your input update is invalid, please check your input!!"
            }
        },
    }
})
</script>
