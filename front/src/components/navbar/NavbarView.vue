<template>
  <section class="sticky top-0 z-10	bg-white">
    <nav class="border-b-2 border-gray-300 p-3 pl-6 pr-6 relative">
      <div class="flex items-center justify-between w-full">
        <div class="w-1/5 flex nav-left">
          <div class="flex items-center hover:border-b-0 ">
            <a href="https://www.passerellesnumeriques.org/en/our-actions/cambodia/" target="_blank">
              <img class="w-30 h-10 " src="../../assets/pncLogo.jpg" alt="" />
            </a>
            <a href="https://www.facebook.com/PnCambodiaAlumni/" target="_blank">
              <img class="w-30 h-8 mx-3" src="../../assets/alumniLogo.jpg" alt="" />
            </a>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <ul v-if="role == 'alumni'"
          :class="showMenu ? 'flex' : 'hidden'"
          class="left-0 nav-menu flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0 w-2/5 flex justify-center"
        >
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link to="/" class="font-bold p-1">HOME</router-link>
          </li>
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link to="/alumni-profile" class="font-bold p-1">PROFILE</router-link>
          </li>
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link to="/allAlumniView" class="font-bold p-1">EXPLORE</router-link>
          </li>
        </ul>
        <ul v-else-if="role == 'admin' || role == 'ero'"
          :class="showMenu ? 'flex' : 'hidden'"
          class="left-0 nav-menu flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0 w-2/5 flex justify-center"
        >
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link :to="isAdminExplore" class="font-bold p-1">EXPLORE</router-link>
          </li>
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link :to="isAdminManage" class="font-bold p-1">MANAGE</router-link>
          </li>
        </ul>

        <ul class="w-1/5 flex justify-end items-center nav-right">
          <li v-if="role == 'alumni'" @click="setting=true" class="mr-3">
              <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
          </li>
          <li v-if="role == 'alumni'" class="text-sm font-bold text-gray-800">
            <router-link to="/alumni-profile" class="font-bold hover:border-b-0">
              <img v-if="user.profile !== undefined" class="w-10 h-10 border-[1px] border-skyblue rounded-full object-cover" :src="'http://127.0.0.1:8000/images/profile/'+user.profile"/>
            </router-link>
          </li>
          <li class="text-sm font-bold text-gray-800 flex items-center username">
            <router-link to="/alumni-profile" class="font-bold p-1 hover:border-b-0">
              {{user.first_name}} {{user.last_name}}
            </router-link>
          </li>
          <li class="text-sm font-bold text-gray-800">
            <div
              class="font-bold p-1 hover:border-b-0 flex items-center"
            >
              <i @click="submitLogout" class="fa fa-sign-out fa-2x text-blue-400 ml-1"></i>
            </div>
          </li>

          <li class="text-sm font-bold text-gray-800 flex items-center">
            <!-- Mobile menu button -->
            <div @click="showMenu = !showMenu" class="flex md:hidden">
              <button type="button" class="">
                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                  <path
                    fill-rule="evenodd"
                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                  ></path>
                </svg>
              </button>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <manage-info v-if="setting" :user_id="user_id" @close="setting=false" />
  </section>
</template>
<script>
import ManageInfo from '../ManageInfo/ManageInfo.vue'
import axios from "../../axios-http"
export default {
  props: {
    user_id: Number,
    role: String
  },
  components: {
    'manage-info': ManageInfo,
  },
  data() {
    return {
      showMenu: false,
      user:{},
      isLoggingOut: false,
      setting: false,

    };
  },
  computed: {
    isAdminExplore() {
      if(this.role == 'admin') {
        return '/explore';
      }else {
        return '/ero-explore';
      }
    },
    isAdminManage() {
      if(this.role == 'admin') {
        return '/admin-manage';
      }else {
        return '/ero-manage';
      }
    },
  },
  methods:{
    getuser(){
      axios.get("/alumni/" + this.user_id).then(res => {
        this.user = res.data;
      });
    },
    submitLogout(){
      setTimeout(() => {
          this.$store.dispatch('logout')
          this.$router.push('/login')
      }, 1000);
    },
  },
  watch: {
    user_id() {
        this.getuser();
    },
  },
  created() {
    if (this.user_id) {
        this.getuser();
    }
  }
};
</script>
<style scoped>

@media screen and (max-width: 768px) {
  .nav-menu {
    width: 100%;
    background: #1a8eb1;
    position: absolute;
    margin-top: 8rem;
    padding: 10px;
    text-align: left;
    padding-left: 1.5rem;
  }
  .nav-menu li {
    width: 95%;
    border-bottom: 1px solid #fff;
  }
  .username {
    display: none;
  }
  a , nav a.router-link-exact-active{
    color: #fff;
  }
  .nav-right , .nav-left{
    width: 30%;
  }
}
</style>
