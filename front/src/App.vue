<template>
  <section>
    <navbar-view ></navbar-view>
    <form-login></form-login>
    <router-view />
  </section>
</template>
<script>
import NavbarVue from "./components/navbar/NavbarView.vue";
import FormLogin from "./views/Login&Logout/LoginView.vue";
export default {
  components: {
    "navbar-view": NavbarVue,
    "form-login": FormLogin
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
