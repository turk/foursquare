<template>
  <div>
    <p style="text-align: center">Venues ({{venues.total}})</p>
    <div v-if="venues.isLoading" class="loader"></div>
    <Venue
      v-for="venue in venues.items"
      :key="venue.name"
      :name="venue.name"
      :address="venue.location.address"
    >
    </Venue>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import Venue from './Venue.vue';

export default {
  name: 'VenueList',
  components: {
    Venue,
  },

  computed: {
    ...mapState(['venues']),
  },
};
</script>

<style scoped>
  .loader {
    margin: 0 auto;
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>
