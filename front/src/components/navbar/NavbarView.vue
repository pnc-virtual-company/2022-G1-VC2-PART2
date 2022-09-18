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
        </ul>
        <ul v-else-if="role == 'admin' || role == 'ero'"
          :class="showMenu ? 'flex' : 'hidden'"
          class="left-0 nav-menu flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0 w-2/5 flex justify-center"
        >
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link to="/explore" class="font-bold p-1">EXPLORE</router-link>
          </li>
          <li class="text-sm font-bold text-gray-800" @click="showMenu = !showMenu">
            <router-link to="/alumni-profile" class="font-bold p-1">MANAGE</router-link>
          </li>
        </ul>

        <ul class="w-1/5 flex justify-end items-center nav-right">
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
  </section>
</template>
<script>
import axios from "../../axios-http"
export default {
  props: {
    user_id: Number,
    role: String
  },
  data() {
    return {
      showMenu: false,
      user:{},
      isLoggingOut: false,


    };
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
