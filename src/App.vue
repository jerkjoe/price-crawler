<template>
  <div>
    <v-header :restaurants=restaurants></v-header>
    <div class="tab border-1px">
      <div class="tab-item">
        <router-link to='/goods'>Goods</router-link>
      </div>
      <div class="tab-item">
        <router-link to='/ratings'>Ratings</router-link>
      </div>
      <div class="tab-item">
        <router-link to='/restaurants'>Restaurants</router-link>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<script>
import Header from './components/header/header.vue'
export default {
  name: 'App',
  components: {
    'v-header': Header
  },
  data() {
    return {
      restaurants: {}
    }
  },
  created() {
    this.$http.get('static/data.json').then(res => {
      res = res.body
      this.restaurants = res.seller
    })
  },
  methods: {}
}
</script>

<style>
</style>
