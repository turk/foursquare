<template>
  <div class="row">
    <div class="col-md-4">
      <Menu></Menu>
    </div>
    <div class="col-md-6">
      <VenueList></VenueList>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Menu from '@/components/Menu.vue';
import VenueList from '@/components/VenueList.vue';

export default {
  name: 'Home',
  components: {
    Menu,
    VenueList,
  },
};
</script>
