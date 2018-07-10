<template>
  <div class="header">
    <div class="content-wrapper">
      <div class="avatar">
        <img width="64" height="64" :src="restaurants.avatar" alt="avatar">
      </div>
      <div class="content">
        <div class="title">
          <span class="brand"></span>
          <span class="name">{{restaurants.name}}</span>
        </div>
        <div class="description">
          {{restaurants.description}} / deliver in {{restaurants.deliveryTime}} minutes
        </div>
        <div v-if="restaurants.supports" class="supports">
          <span class="icon" :class="classMap[restaurants.supports[0].type]"></span>
          <span class="text">{{restaurants.supports[0].description}}</span>
        </div>
      </div>
      <div v-if="restaurants.supports" class="support-count" @click="toggleDetail">
        <span class="count">
          {{restaurants.supports.length}} More
          <i class="icon-keyboard_arrow_right"></i>
        </span>
      </div>
    </div>
    <div class="bulletin-wrapper" @click="toggleDetail">
      <span class="bulletin-title"></span><span class="bulletin-text">{{restaurants.bulletin}}</span>
      <i class="icon-keyboard_arrow_right"></i>
    </div>
    <div class="background">
      <img :src="restaurants.avatar" alt="avatar-bg" width="100%" height="100%">
    </div>
    <div v-show="detailShow" class="detail">
      <div class="detail-wrapper clearfix">
        <div class="detail-main">
          <h1 class="name">{{restaurants.name}}</h1>
          <div class="star-wrapper">
            <star :score="restaurants.score" :size="48"></star>
          </div>
        </div>
      </div>
      <div class="detail-close">
        <i class="icon-close" @click="toggleDetail"></i>
      </div>
    </div>
  </div>
</template>

<script>
import Star from 'components/star/star.vue'
export default {
  name: 'Header',
  data() {
    return {
      detailShow: false
    }
  },
  methods: {
    toggleDetail() {
      this.detailShow = !this.detailShow
    }
  },
  props: {
    restaurants: {
      type: Object
    }
  },
  created() {
    this.classMap = ['decrease', 'discount', 'special', 'guarantee', 'invoice']
  },
  components: {
    'star': Star
  }
}
</script>

<style lang="stylus" scoped>
@import "~common/stylus/mixin.styl"
.header
  overflow hidden
  position relative
  color #ffffff
  background rgba(7,17,27,0.5)
  .content-wrapper
    position relative
    padding 24px 12px 18px 24px
    font-size 0
    .avatar
      vertical-align top
      display inline-block
      img
        border-radius 2px
    .content
      display inline-block
      margin-left 16px
      .title
        margin 2px 0 8px 0
        .brand
          vertical-align top
          width 30px
          height 18px
          display inline-block
          bg-image("brand")
          background-size 30px 18px
          background-repeat no-repeat
        .name
          margin-left 6px
          font-size 16px
          line-height 18px
          font-weight bold
      .description
        margin-bottom 10px
        line-height 12px
        font-size 12px
      .supports
        .icon
          vertical-align top
          display inline-block
          width 12px
          height 12px
          margin-right 4px
          background-size 12px 12px
          background-repeat no-repeat
          &.decrease
            bg-image('decrease_1')
          &.discount
            bg-image('discount_1')
          &.guarantee
            bg-image('guarantee_1')
          &.invoice
            bg-image('invoice_1')
          &.special
            bg-image('special_1')
        .text
          line-height 12px
          font-size 12px
    .support-count
      position absolute
      right 12px
      bottom 14px
      padding 0 8px
      height 24px
      line-height 24px
      border-radius 14px
      background-color rgba(0,0,0,0.2)
      text-align center
      .count
        vertical-align top
        font-size 10px
      .icon-keyboard_arrow_right
        margin-left 2px
        line-height 24px
        font-size 10px
  .bulletin-wrapper
    height 28px
    line-height 28px
    padding 0 22px 0 12px
    overflow hidden
    text-overflow ellipsis
    white-space nowrap
    position relative
    background-color rgba(7,17,27,.2)
    .bulletin-title
      vertical-align middle
      display inline-block
      height 12px
      width 22px
      bg-image('bulletin')
      background-size 22px 12px
      background-repeat no-repeat
    .bulletin-text
      vertical-align middle
      font-size 10px
      margin 0 4px
    .icon-keyboard_arrow_right
      position absolute
      font-size 10px
      right 14px
      top 10px
.background
  position absolute
  top 0
  left 0
  width 100%
  height 100%
  z-index -1
  filter blur(5px)
.detail
  position fixed
  z-index 100
  top 0
  left 0
  width 100%
  height 100%
  overflow auto
  background-color rgba(7,17,27,0.8)
  .detail-wrapper
    width 100%
    min-height 100%
    .detail-main
      margin-top 64px
      padding-bottom 64px
      .name
        line-height 16px
        text-align center
        font-size 16px
        font-weight 700
      .star-wrapper
        margin-top 18px
        padding 2px 0
        text-align center
  .detail-close
    position relative
    width 32px
    height 32px
    margin -64px auto 0 auto
    clear both
    font-size 32px
</style>
