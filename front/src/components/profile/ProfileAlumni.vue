<template>
    <section>
    <div class="w-[90%] m-auto">
        <div >
            <div class="relative">
                <div class="w-full h-52">
                    <img v-if="user.coverimage != null" class="w-full h-full  border border-1 border-gray-300" :src="'http://127.0.0.1:8000/images/Cover/'+ user.coverimage" alt="">
                </div>
                <div class="flex justify-end mt-[-40px]">
                    <input @change="tageImage($event,'cover')" id="cover-upload" type="file" accept="image/*" hidden>
                    <label for="cover-upload">
                        <div class="flex bg-gray-200 px-4 py-1 rounded-md mr-2 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-medium">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 font-medium ">Edit cover photo</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="absolute ml-24 text-center">
            <div class="flex">
                <div class="w-40">
                    <img v-if="user.profile" class=" rounded-full h-40 mt-[-130px]  border border-b-1 border-[#22bbea]" :src="'http://127.0.0.1:8000/images/profile/'+ user.profile" alt="">
                </div>
                <div>
                    <input @change="tageImage($event,'profile')" id="profile-upload" type="file" accept="image/*" hidden>
                    <label for="profile-upload">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 hover:cursor-pointer bg-gray-300 p-1 rounded-full ml-[-40px] mt-[-16px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                    </label>
                </div>
            </div>
            <h1 class="font-bold text-xl">Sreymao Vorn</h1>
        </div>        
        <div class="flex justify-between mt-8 items-start">
            <div class="w-[32%] border-[2px] border-[#22bbea] p-3 rounded mt-14">
                <CardSkills />
            </div>
            <div class="w-[64%]">
                <CardInfo :user="user" @getData="getUser" />
                <CardExper :edu="edu">Education Background</CardExper>
                <CardExper 
                :experiences="experiences" 
                @cardEditor="editWorkExper"
                @formInputStatus="formInputStatus">Work Experiences</CardExper>
                <!-- form be able to add work experience's alumni -->
                <FormAddExper 
                v-if="formStatus=='Add'"
                :companies="companies"
                @formInputStatus="formInputStatus"
                @addAlumniExper="addAlumniExper"
                ></FormAddExper>
                <FormEditExper
                v-if="formStatus=='Edit' && experiences!=null"
                @formInputStatus="formInputStatus"  
                :companies="companies" 
                :experience="experiences[indexExper]"
                @saveEditExper="saveEditExper"
                ></FormEditExper>
            </div>
        </div>
    </div>
    <update-cover-view v-if="isUpdateCover" @cancelUpdate="isUpdateCover=false" :cover="cover" @save-cover="saveCover"></update-cover-view>
    <update-profile-view v-if="isUpdate" @isUpdate="isUpdate=false" :profile="profile" @save-upload="saveUpload"></update-profile-view>
</section>
</template>
<script>
import FormEditExper from "../FormInput/FormEditExper.vue"
import FormAddExper from "../FormInput/FormAddExper.vue"
import axios from '../../axios-http'
import CardInfo from "../CardInfo.vue"
import CardSkills from "../skills/CardSkills.vue"
import CardExper from "../CardExper.vue"
import updateProfileView from "../profile/UpdateProfileView.vue";
import UpdateCoverView from "../profile/UpdateCoverView.vue";
export default {
    components:{
        CardInfo,
        CardSkills,
        CardExper,
        FormAddExper,
        "update-profile-view":updateProfileView,
        "update-cover-view":UpdateCoverView,
        FormEditExper
    },
    data() {
        return {
            user: {},
            edu: [
                {school: 'Passerelles Numeriques Cambodia', degree: "Associat's degree", major: 'Information Technology', start_year: 2020, end_year: 2022, src: 'https://previews.123rf.com/images/anthonycz/anthonycz1612/anthonycz161200005/68815871-school-vector-icon-isolated-building-on-white-background.jpg'},
                // {school: 'Passerelles Numeriques Cambodia', degree: "Associat's degree", major: 'Information Technology', start_year: 2020, end_year: 2022, src: 'https://previews.123rf.com/images/anthonycz/anthonycz1612/anthonycz161200005/68815871-school-vector-icon-isolated-building-on-white-background.jpg'},
            ],
            experiences: [
                // {name: 'Sourceamax Asia', position: 'Front End Developer', start_year: '2020-02', end_year: '2020-02', src: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC'},
                // {name: 'Sourceamax Asia', position: 'Front End Developer', start_year: '2020-02', end_year: '2020-02', src: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC'},
                ],
            isUpdate: false,
            isUpdateCover: false,
            image:'',
            profile:'',
            cover:'',
            formStatus:null,
            indexExper:null,
            companies:null,
            alumni_id:null,
        }
    },

    methods:{
        //Form for Add or Edit work experience's alumni
        formInputStatus(status){
            this.formStatus=status;
        },

        addAlumniExper(newExper){
            newExper['alumni_id']=this.alumni_id;
            axios.post("workexperience", newExper).then(res => {
                console.log(res);
                this.getAlumniExperiences()
            });
        },
        editWorkExper(workExper){
            this.formStatus=workExper.status
            this.indexExper=workExper.index
        },
        
        saveEditExper(experience){
            axios.put("workexperience/" + this.experiences[this.indexExper].id , experience).then(res => {
                console.log(res)
                this.getAlumniExperiences()
            });
            experience['src']=this.imgWorkExper
            this.experiences[this.indexExper]=experience
        },
        updateProfile(){
            console.log("updateProfile called   with profile: ")
        },
        tageImage(event, update){
            this.image = event.target.files[0];
            if(update == "profile"){
                this.isUpdate = true;
                this.profile = URL.createObjectURL(event.target.files[0]);
            }else{
                this.isUpdateCover = true;
                this.cover = URL.createObjectURL(event.target.files[0]);
            }
        },
        saveUpload() {
        let formData = new FormData();
        formData.append("profile", this.image);
        formData.append("_method", "PUT");
        axios.post("/alumniprofile/" + 1, formData).then((res) => {
            console.log(res);
            this.getUser();
            this.isUpdate=false;
        });
        },
        saveCover() {
        let formData = new FormData();
        formData.append("coverimage", this.image);
        formData.append("_method", "PUT");
        axios.post("/alumnicover/" + 1, formData).then(() => {
            this.getUser();
            this.isUpdateCover=false;
        });
        },
        getUser() {
            axios.get('/alumni/1').then(res=> {
                this.user = res.data;
            })
        },

        getAlumniExperiences(){
            axios.get('workexperience/1').then(res => {
                this.experiences = res.data, 
                this.alumni_id=res.data[0].alumni_id
            });
        },
        getCompanies(){
            axios.get('companies').then(res => {
                this.companies = res.data
            });
        }
    },
    mounted() {
        this.getUser();
        this.getAlumniExperiences();
        this.getCompanies();
    },
};
</script>


