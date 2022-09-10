<template>
  <section>
    <navbar-view></navbar-view>
    <router-view />
  </section>
</template>
<script>
import NavbarVue from "./components/navbar/NavbarView.vue";
export default {
  components: {
    "navbar-view": NavbarVue,
  },
};
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
}
nav a.router-link-exact-active {
  color: #ff9933;
}
nav a:hover {
  border-bottom: 2px solid #ff9933;
}
</style>
