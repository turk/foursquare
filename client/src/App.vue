<template>
  <div id="app">
    <notifications group="app"/>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'Menu',

  mounted() {
    this.$store.dispatch('fetchCategories');
  },
};
</script>

<style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
  }
</style>
