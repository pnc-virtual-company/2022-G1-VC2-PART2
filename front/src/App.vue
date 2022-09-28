<template>
  <section>
    <navbar-view :role="this.$store.state.role" :user_id="this.$store.state.userId" ref="navigation" />
    <router-view :user_id="this.$store.state.userId" :alu_id="this.$store.state.alumniId" :role="this.$store.state.role" @update-nav="$refs.navigation.getuser()" />
  </section>
</template>
<script>
import NavbarVue from "./components/navbar/NavbarView.vue";
import axios from "./axios-http"
export default {
  components: {
    "navbar-view": NavbarVue,
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
        const alumni = await axios.get('/alumni/'+ data.id);
        this.$store.state.userId = data.id;
        this.$store.state.userEmail = data.email;
        this.$store.state.alumniId = alumni.data.id;
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
