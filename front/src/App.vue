<template>
  <section>
    <navbar-view ></navbar-view>
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
nav a.router-link-exact-active {
  color: #ff9933;
}
nav a:hover {
  color: #ff9933;
}
</style>
