<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png" width="100">
    <Welcome/>
  </div>
</template>
<script>
// @ is an alias to /src
import Welcome from '@/components/WelcomeView';
export default {
  name: 'HomeView',
  components: {
    Welcome
  }
}
</script>