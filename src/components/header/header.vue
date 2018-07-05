<template>
  <div class="header">
    <div class="content-wrapper">
      <div class="avatar">
        <img width="64" height="64" :src="restaurants.avatar" alt="">
      </div>
      <div class="content">
        <div class="title">
          <span class="brand">Brand</span>
          <span class="name">{{restaurants.name}}</span>
        </div>
        <div class="description">
          {{restaurants.description}} / deliver in {{restaurants.deliveryTime}} minutes
        </div>
        <div v-if="restaurants.supports" class="supports">
          <span class="icon"></span>
          <span class="text">{{restaurants.supports[0].description}}</span>
        </div>
      </div>
    </div>
    <div class="bulletin-wrapper"></div>
  </div>
</template>

<script>
export default {
  name: 'Header',
  props: {
    restaurants: {
      type: Object
    }
  }
}
</script>

<style lang="stylus" scoped>
.header
  color #ffffff
  background-color #e3e3e3
  .content-wrapper
    padding 24px 12px 18px 24px
    font-size 0
    .avatar
      display inline-block
    .content
      font-size 14px
      display inline-block
      margin-left 16px
      .title
        margin 2px 0 8px 0
        .brand
          
</style>
