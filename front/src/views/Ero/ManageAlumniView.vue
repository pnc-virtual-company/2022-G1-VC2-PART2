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
      <filterAlumni :countAlumnis="dataAlumnis" @matchAlumni="displayAlumni" />
      <listAlumni
        class="w-[80%] m-auto mt-3"
        @matchAlumni="displayAlumni"
        @searchAlumni="queryAlumni"
        @removeAlumni="removeAlumni"
        @invite="isInvite = true"
        :alumnis="filterAlumnis"
      />
    </div>
    <company-list v-if="isActive == 1" class="text-center mt-4" />
    <university-list v-if="isActive == 2" class="text-center mt-4" />
    <invite-alumni v-if="isInvite" @cancelInvite="isInvite=false" @inviteAlumni="inviteAlumni"></invite-alumni>
  </section>
</template>
<script>
import Company from "./CompanyView.vue";
import University from "./UniversityView.vue";
import listAlumni from "../../components/Manage/ListAlumnis.vue";
import filterAlumni from "../../components/Manage/Alumnicardstatus.vue";
import InviteAlumni from "../Alumni/FormInput/FormInviteAlumniView.vue"
import axios from "../../axios-http";
import swal from "sweetalert";
export default {
  components: {
    "company-list": Company,
    "university-list": University,
    "invite-alumni": InviteAlumni,
    listAlumni,
    filterAlumni,
  },
  data() {
    return {
      isActive: 0,
      dataAlumnis: [],
      filterAlumnis: [],
      isInvite:false,
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
          axios.delete("removeAlumni/" + id).then(() => {
            this.getListAlumni();
            swal("removed !", "Your work experince is removed !", "success");
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
        console.log(email);
        this.isInvite = false;
    },
  },
  mounted() {
    this.getListAlumni();
  },
};
</script>
