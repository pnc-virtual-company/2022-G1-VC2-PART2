<template>
  <section>
    <navbar-view :role="this.$store.state.role" :user_id="this.$store.state.userId" />
    <!-- <form-login></form-login> -->
    <router-view :user_id="this.$store.state.userId" />
  </section>
</template>
<script>
import NavbarVue from "./components/navbar/NavbarView.vue";
// import FormLogin from "./views/Login&Logout/LoginView.vue";
import axios from "./axios-http"
export default {
  components: {
    "navbar-view": NavbarVue,
    // "form-login": FormLogin
  },
  methods: {
    async getUserInfo(){
      if(this.$cookies.get('alumni')){
        const result = await axios.get('/getinfo')
        const data = await result.data.data;
        if(data==null){
            this.$store.dispatch('logout')
            this.$router.push('/login')
        }
        this.$store.state.userId = data.id;
        this.$store.state.userEmail = data.email;
      }
    },
  },
  async created(){
    this.getUserInfo()
  },

};
</script>
<style>
nav a.router-link-exact-active {
  color: #ff9933;
}
nav a:hover {
  color: #ff9933;
}
</style>
