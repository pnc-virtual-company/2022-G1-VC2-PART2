<template>
    <section>
    <div class="w-[80%] m-auto">
        <div >
            <div class="relative">
                <div class="w-full h-52">
                    <img v-if="user.coverimage != undefined" class="w-full h-full  border border-1 border-gray-300 object-cover object-center" :src="'http://127.0.0.1:8000/images/Cover/'+ user.coverimage" alt="">
                </div>
                <div class="flex justify-end mt-[-40px]">
                    <input @change="tageImage($event,'cover')" @click="value" id="cover-upload" type="file" accept="image/*" hidden>
                    <label for="cover-upload">
                        <div class="flex bg-gray-200 px-4 py-1 rounded-md mr-2 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-gray-600">Edit cover photo</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="absolute ml-24 text-center">
            <div class="flex">
                <div class="w-40">
                    <img v-if="user.profile!=undefined" class="w-full rounded-full h-40 mt-[-130px] object-cover border-[1px] border-skyblue" :src="'http://127.0.0.1:8000/images/profile/'+ user.profile" alt="">
                </div>
                <div>
                    <input @change="tageImage($event,'profile')" @click="value" id="university-profile" type="file" accept="image/*" hidden>
                    <label for="university-profile">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 hover:cursor-pointer bg-gray-300 p-1 rounded-full ml-[-40px] mt-[-16px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                    </label>
                </div>
            </div>
            <h1 class="font-bold text-xl">{{user.first_name}} {{user.last_name}}</h1>
        </div>        
        <div class="flex justify-between mt-8 items-start">
            <CardSkills :alu_id="alu_id" :role="role" />
             <div class="w-[64%]">
                <CardInfo :user="user" @getData="getUser" @update-nav="$emit('update-nav')" />
                
                <!-- +++++++++++ Alumni Education +++++++++++++ -->
                <edu-card-view :edu="edu" @is-add-edu="isAddEdu=true" @isEdit-edu="isEditEduction" :alu_id="alu_id" @removeEdu="removeEdu" :role="role"></edu-card-view>
                <FormAddEduView  v-if="isAddEdu" :universities="universities" @addEdu="addEducation" @cancelAdd="isAddEdu=false" @added-new-univer="addedNewUniver" :alu_id="alu_id"></FormAddEduView>
                <edit-edu-view v-if="isEditEdu" :universities="universities" :education="education" @editEdu="editEducation" @cancelEdit="isEditEdu=false" @added-new-univer="addedNewUniver" :alu_id="alu_id"></edit-edu-view>

                <CardExper :role="role"
                @removeExper="removeExper"
                :experiences="experiences" 
                @editor="editWorkExper"
                @clickPopUp="popUp"></CardExper>
                <!-- form be able to add work experience's alumni -->
                <FormAddExper 
                v-if="isPopUp=='Add'"
                :companies="companies"
                @add-company="addCompany"
                @clickPopUp="popUp"
                @addAlumniExper="addAlumniExper"
                ></FormAddExper>
                <FormEditExper
                v-if="isPopUp=='Edit'"
                @clickPopUp="popUp"  
                @add-company="addCompany"
                :companies="companies" 
                :experience="editExperience"
                @edit-workExper="saveEditExper"
                ></FormEditExper>
            </div>
        </div>
    </div>
    <update-cover-view v-if="isUpdateCover" @cancelUpdate="isUpdateCover=false" :cover="cover" @save-cover="saveCover"></update-cover-view>
    <update-profile-view v-if="isUpdate" @isUpdate="isUpdate=false" :profile="profile" @save-upload="saveUpload"></update-profile-view>
</section>
</template>
<script>
import swal from 'sweetalert';
import axios from '../../../axios-http'
import FormEditExper from "../FormInput/FormEditExper.vue"
import FormAddExper from "../FormInput/FormAddExper.vue"
import CardInfo from "../CardView/CardInfo.vue"
import CardSkills from "../skills/CardSkills.vue"
import CardExper from "../CardView/CardExper.vue"
import EduCard from '../CardView/EduCard.vue'
import FormAddEduView from "../FormInput/FormAddEduView.vue"
import FormEditEduView from "../FormInput/FormEditEduView.vue"
import updateProfileView from "./UpdateProfileView.vue";
import UpdateCoverView from "./UpdateCoverView.vue";
export default {
    props: {
        user_id: Number,
        alu_id: Number,
        role: String,
    },
    emits: ['update-nav'],
    components:{
        CardInfo,
        CardSkills,
        CardExper,
        FormAddExper,
        "update-profile-view":updateProfileView,
        "update-cover-view":UpdateCoverView,
        'edu-card-view': EduCard,
        'edit-edu-view': FormEditEduView,
        FormAddEduView,
        FormEditExper
    },
    data() {
        return {
            user: {},
            edu: [],
            experiences: [],
            editExperience:{},
            isUpdate: false,
            isUpdateCover: false,
            image:'',
            profile:'',
            cover:'',
            isPopUp:null,
            companies:null,
            universities:null,
            isAddEdu:false,
            isEditEdu:false,
            education:{},
        }
    },
    
    methods:{
        //Form for Add or Edit work experience's alumni
        popUp(opup){
            this.isPopUp=opup;
        },
        addAlumniExper(newExper){
            newExper['alumni_id']=this.alu_id;
            axios.post("workexperience", newExper).then(() => {
                this.getAlumniExperiences()
                swal("Added !", "You add new work experience successfully !", "success");
            });
        },
        editWorkExper(experience){
            this.isPopUp='Edit'
            this.editExperience=experience;
        },
        saveEditExper(experience){
            axios.put("workexperience/" + this.editExperience.id , experience).then(() => {
                this.getAlumniExperiences()
            });
        },
        tageImage(event, update){
            let img = event.target.files[0];
            console.log(img)
            if (img != undefined) {
                this.image = img;
                if(update == "profile"){
                    this.isUpdate = true;
                    this.profile = URL.createObjectURL(this.image);
                }else{
                    this.isUpdateCover = true;
                    this.cover = URL.createObjectURL(this.image);
                }
            }

        },
        saveUpload() {
        let formData = new FormData();
        formData.append("profile", this.image);
        formData.append("_method", "PUT");
        axios.post("alumniprofile/" + this.alu_id, formData).then((res) => {
            this.getUser();
            this.isUpdate=false;
            this.$emit('update-nav');
        });
        },
        saveCover() {
        let formData = new FormData();
        formData.append("coverimage", this.image);
        formData.append("_method", "PUT");
        axios.post("alumnicover/" + this.alu_id, formData).then(() => {
            this.getUser();
            this.isUpdateCover=false;
        });
        },
        getUser() {
            axios.get('alumni/' + this.user_id).then(res=> {
                this.user = res.data;
            })
        },
        getAlumniExperiences(){
            axios.get('workexperience/'+this.alu_id).then(res => {
                this.experiences = res.data
            });
        },
        addCompany(company){
            axios.post('company', company).then(() => {
                this.getCompanies()})
        },
        getCompanies(){
            axios.get('companies').then(res => {
                this.companies = res.data
            });
        },
        removeExper(exper_id){
            swal({
                title: "Are you sure?",
                text: "You want to remove this work experience !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete("experience/remove/"+exper_id).then(() => {
                        this.getAlumniExperiences();
                        swal("removed !", "Your work experince is removed !", "success");
                    });
                } 
            });

        },

        getAlumniEdu(){
            axios.get('alumniEdu/'+ this.alu_id).then(res => {
                this.edu = res.data
            });
        },
        getUniversities(){
            axios.get('universities').then(res => {
                this.universities = res.data
            });
        },
        addEducation(newEdu){
            axios.post("education", newEdu).then(() => {
                this.getAlumniEdu();
                this.isAddEdu = false;
                swal("Added !", "You add new education successfully !", "success");
            });
        },
        isEditEduction(education){
            this.isEditEdu = true;
            this.education = education;
        },
        editEducation(newEdu,edu_id){
            axios.put("education/"+edu_id, newEdu).then(() => {
                this.getAlumniEdu();
                this.isEditEdu = false;
            });
        },
        removeEdu(edu_id){
            swal({
                title: "Are you sure?",
                text: "You want to remove this education !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete("education/remove/"+edu_id).then(() => {
                        this.getAlumniEdu();
                        swal("removed !", "Your education is removed !", "success");
                    });
                } 
            });
        },
        addedNewUniver(){
            this.getUniversities();
        },
        value(event) {
            event.target.value = null;
        }
    },
    watch: {
        user_id() {
            this.getUser();
            this.getAlumniExperiences();
            this.getCompanies();
            this.getAlumniEdu();
            this.getUniversities();
        }
    },

    created() {
        if (this.user_id) {
            this.getUser();
            this.getAlumniExperiences();
            this.getCompanies();
            this.getAlumniEdu();
            this.getUniversities();
        }
    }
};
</script>


