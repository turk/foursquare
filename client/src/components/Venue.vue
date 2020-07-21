<template>
  <div>
      <div class="col-sm-12">
        <div class="listing-item-grid">
          <div class="listing-item-grid_title">
            <h3>{{name}}</h3>
            <p>{{address}}</p>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'Venue',

  props: {
    name: String,
    address: String,
  },
};
</script>

<style scoped>
  .listing-item-grid {
    padding: 50px 30px;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
  }

  .listing-item-grid_title {
    position: absolute;
    left: 20px;
    bottom: 20px;
    right: 20px;
    z-index: 10;
    text-align: left;
  }

  .listing-item-grid_title h3 {
    font-family: 'Raleway', sans-serif;
    font-weight: 700;
    padding-bottom: 5px;
    margin-bottom: 10px;
    font-size: 22px;
    position: relative;
  }

  .listing-item-grid_title h3 {
    color: black;
  }

  .listing-item-grid_title p {
    color: black;
    transition: all .3s
  }
</style>
