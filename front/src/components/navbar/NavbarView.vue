<template>
  <section class="sticky top-0	bg-white">
    <nav class="border-b-2 border-gray-300 p-3 pl-6 pr-6 relative">
      <div class="flex items-center justify-between w-full">
        <div class="w-1/5 flex nav-left">
          <router-link to="/" class="flex items-center hover:border-b-0 ">
            <img class="w-30 h-10 " src="@/assets/pncLogo.jpg" alt="" />
            <img class="w-30 h-8 mx-3" src="@/assets/alumniLogo.jpg" alt="" />
          </router-link>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <ul
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

        <ul class="w-1/5 flex justify-end items-center nav-right">
          <li class="text-sm font-bold text-gray-800">
            <router-link to="/alumni-profile" class="font-bold hover:border-b-0">
              <img class="w-10 h-10 rounded-full" :src="'http://127.0.0.1:8000/images/profile/'+profile"/>
            </router-link>
          </li>
          <li class="text-sm font-bold text-gray-800 flex items-center username">
            <router-link to="/alumni-profile" class="font-bold p-1 hover:border-b-0">
              Vansao Hang
            </router-link>
          </li>
          <li class="text-sm font-bold text-gray-800">
            <router-link
              to="/alumni-profile"
              class="font-bold p-1 hover:border-b-0 flex items-center"
            >
              <i class="fa fa-sign-out fa-2x text-blue-400 ml-1"></i>
            </router-link>
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

  data() {
    return {
      showMenu: false,
      profile:{}
    };
  },
  methods:{
    getuser(){
      axios.get("alumni/1").then(res => {this.profile = res.data.profile});
    }
  },
  mounted(){
    this.getuser()
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
