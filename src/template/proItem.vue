<template>
  <div>
    <div class="sum">
      <div class="sum_left">
        <a href="javascript:;"><img :src="data.img_src" alt="zhong1"></a>
      </div>
      <div class="sum_right">
        <!--<h3 class="title">{{data.title}}{{data.subtitle}}</h3>-->
        <router-link class="title" :to="{ name : 'proDetails' , query : { id : data.id} }">{{data.title}}{{data.subtitle}}</router-link>
        <h4><i>破损包退</i><b>包邮</b></h4>
        <h5>￥<span>{{data.price | currency}}</span></h5>
        <GoBuy :inform="{ id:data.id ,price:data.price }"></GoBuy>
      </div>
    </div>
  </div>
</template>

<script>
  import GoBuy from './goBuy.vue'
  export default {
    name : 'proItemComponent',
    props:[
     'data'
    ],
    components:{
      GoBuy
    },
    data() {
      return {
        title : '碧欧泉 美白净透修颜防晒隔离乳霜',
        subtitle : '30ml 紫绿蓝白粉',
        price : 998,

      }
    },

  }
</script>

<style scoped lang="less">
  .sum {
    overflow: hidden;
    width: 690px;
    margin: 22px 30px 0;
    .sum_left {
      float: left;
      margin-top: 8px;
      a {
        img {
          width: 280px;
          height: 262px;
        }
      }
    }
    .sum_right {
      float: left;
      margin-left: 26px;
      a {
        display: block;
        font-size: 24px;
        color: #a441ff;
        width: 374px;
        height: 80px;
        line-height: 40px;
        overflow: hidden;
      }
      h4 {
        margin-top: 18px;
        font-size: 20px;
        line-height: 28px;
        overflow: hidden;
        i {
          float: left;
          color: #666;
          padding: 0 6px;
          border: 1px solid #666666;/*no*/
          border-radius: 7px;
          margin-right: 12px;
        }
        b {
          float: left;
          color: #666;
          width: 60px;
          border: 1px solid #666666;/*no*/
          border-radius: 7px;
          text-align: center;
        }
      }
      h5 {
        margin-top: 18px;
        font-size: 24px;
        color: #ff3352;
        span {
          font-size: 48px;
          color: #ff3352;
        }
      }
      .buy {
        display: inline-block;
        font-size: 24px;
        color: #fff;
        padding: 0 12px;
        line-height: 40px;
        text-align: center;
        background: #ff3352;
        border: 1px solid #ff3352;/*no*/
        border-radius: 6px;
        margin-top: 18px;
      }
    }
  }

</style>
