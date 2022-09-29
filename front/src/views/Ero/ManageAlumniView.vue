<template>
  <section class="">
    <div class="flex justify-between">
      <p></p>
      <div class="flex">
        <p @click="isActive = 0" class="p-4 font-semibold hover:cursor-pointer" :class="{ 'text-orange border-b-[2px] border-orange': isActive == 0 }">
            ALUMNI
        </p>
        <p @click="isActive = 1" class="p-4 font-semibold hover:cursor-pointer" :class="{ 'text-orange border-b-[2px] border-orange': isActive == 1 }"> 
            COMPANY
        </p>
        <p @click="isActive = 2" class="p-4 font-semibold hover:cursor-pointer" :class="{ 'text-orange border-b-[2px] border-orange': isActive == 2 }">
            UNIVERSITY
        </p>
      </div>
      <p></p>
    </div>
    <div v-if="isActive == 0" class="text-center">
      <listAlumni 
        class="w-[80%] m-auto mt-3"
        @matchAlumni="displayAlumni"
        @showDetail="showDetail"
        @searchAlumni="queryAlumni"
        @removeAlumni="removeAlumni"
        @invite="isInvite = true, sms = ''"
        :alumnis="filterAlumnis"
        :countAlumnis="dataAlumnis"
      />
    </div>
    <company-list v-if="isActive == 1" class="text-center mt-4" />
    <university-list v-if="isActive == 2" class="text-center mt-4" />
    <invite-alumni v-if="isInvite" @cancelInvite="isInvite=false" @inviteAlumni="inviteAlumni" :inviteMessage="inviteMessage" :sms="sms" @sms="sms=''"></invite-alumni>
    <alumni-detail v-if="isDetail" :alumniDetail="alumniDetail" @approve="approve" @reject="reject"  @cancel="cancel"></alumni-detail> 
  </section>
</template>
<script>
import Company from "./CompanyView.vue";
import University from "./UniversityView.vue";
import listAlumni from "../../components/Manage/ListAlumnis.vue";
import InviteAlumni from "../Alumni/FormInput/FormInviteAlumniView.vue";
import AlumniDetail from "../../components/Manage/AlumniDetail.vue"
import axios from "../../axios-http";
import swal from "sweetalert";
export default {
  components: {
    "company-list": Company,
    "university-list": University,
    "invite-alumni": InviteAlumni,
    listAlumni,
    'alumni-detail': AlumniDetail
  },
  data() {
    return {
      isActive: 0,
      dataAlumnis: [],
      filterAlumnis: [],
      isInvite: false,
      inviteMessage: '',
      isDetail:false,
      alumniDetail:[],
      sms: '',
    };
  },
  methods: {
    getListAlumni() {
      axios.get("userAlumni").then((res) => {
        this.dataAlumnis = res.data;
        this.filterAlumnis = res.data;
      });
    },
    removeAlumni(id) {
      swal({
        title: "Are you sure?",
        text: "You want to remove this alumni !!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          axios.post("sendRemoveAccount/" + id) 
          axios.delete("removeUser/" + id).then(() => {
            swal("removed !", "Your work experince is removed !", "success");
            this.getListAlumni();
          });
        }
      });
    },
    displayAlumni(status) {
      if (status.toLowerCase() == "all") {
        this.filterAlumnis = this.dataAlumnis;
      } else {
        this.filterAlumnis = this.dataAlumnis.filter(
          (match) => match["status"].toLowerCase() == status.toLowerCase()
        );
      }
    },
    queryAlumni(value) {
      this.filterAlumnis = this.dataAlumnis.filter((key) => {
        let alumni = key.first_name + key.last_name + key.email + key.major + key.status;
        return alumni.toLowerCase().includes(value.toLowerCase());
      });
    },
    
    inviteAlumni(email) {
      this.sms = '';
      axios.post("inviteAlumni",{email:email}).then(() => {
        this.isInvite = false;
        this.getListAlumni();
        swal("Invited !", "This ero account has been invited !", "success");
      }).catch(err=> {
        this.sms = 'This email has already token!'
      });
      this.inviteMessage = "Sending invite ..."
      setTimeout(() => this.inviteMessage='' , 5000)
    },
    
    approve(user_id){
      axios.post("approveAlumni/" + user_id)
      axios.put("approve/" + user_id).then(() => {
        swal("Approved !", "This alumni account has been approved !", "success");
        this.isDetail = false;
        this.getListAlumni();
      });
    },

    reject(user_id){
      swal({
        title: "Are you sure?",
        text: "You want to reject this alumni !!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
            axios.post("rejectAlumni/" + user_id)
            axios.delete("removeUser/" + user_id)
            .then(() => {
              this.isDetail = false;
              this.getListAlumni();
            });
          }
      });

    },
    showDetail(alumni){
      this.alumniDetail = alumni;
      this.isDetail = true;
    },
    cancel(){
      this.isDetail = false;
    },
  },
  mounted() {
    this.getListAlumni();
  },
};
</script>
