<template>
  <div>
    <div class="user-page">
      <div class="header">
        <div class="headerTop">
          <div class="back"  id="back" v-back><img :src="returnSrc" alt=""></div>
          <div><span>个人</span></div>
          <div><p>设置</p></div>
        </div>
        <div class="headerBottom">
          <div class="left">
            <img :src="headSrc" alt="">
            <span>{{user}}</span>
            <router-link to="login" >{{messgage}}</router-link>
          </div>
          <div class="right">
            <span>珍珠值</span><em>666</em>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="may">
          <ul>
            <li>
              <img :src="moneySrc" alt="money.png">
              <p>购买记录</p></li>
            <li>
              <img :src="attentionSrc" alt="attention.png">
              <p>关注店铺</p></li>
            <li>
              <img :src="footprintSrc" alt="footprint.png">
              <p>足迹</p>
            </li>
          </ul>
        </div>
        <div class="address">
          <ul>
            <li>
              <img class="ad" :src="landmarkSrc" alt="landmark.png">
              <span>收货地址：<em>广东省广州市天河区五山大道1090号</em></span>
              <img class="right-arrow" :src="rightArrowSrc" alt="right-arrow.png">
            </li>
          </ul>
          <button>添加地址</button>
        </div>
        <div class="my-order">
          <p>我的订单</p>
          <div class="more-order">
            <a href="#">查看更多订单</a>
            <img :src="rightArrowSrc" alt="right-arrow.png">
          </div>
        </div>
        <div class="flow">
          <div><img :src="paymentSrc" alt="payment.png">
            <p>待付款</p></div>
          <div><img :src="shipmentsSrc" alt="shipments.png">
            <p>待发货</p></div>
          <div><img :src="receivingSrc" alt="receiving.png">
            <p>待收货</p></div>
          <div><img :src="evaluateSrc" alt="evaluate.png">
            <p>待评价</p></div>
          <div><img :src="refundSrc" alt="refund.png">
            <p>退款/售后</p></div>
        </div>
      </div>
      <footer-btn></footer-btn>
    </div>
  </div>
</template>

<script>
  export default {
    name:'user',
    data(){
      return{
        returnSrc : require('../img/return.png'),
        headSrc : require('../img/head.png'),
        moneySrc : require('../img/money.png'),
        attentionSrc : require('../img/attention.png'),
        footprintSrc : require('../img/footprint.png'),
        landmarkSrc : require('../img/landmark.png'),
        rightArrowSrc : require('../img/right-arrow.png'),
        paymentSrc : require('../img/payment.png'),
        shipmentsSrc : require('../img/shipments.png'),
        receivingSrc : require('../img/receiving.png'),
        evaluateSrc : require('../img/evaluate.png'),
        refundSrc : require('../img/refund.png'),
        user:'请登录',
        messgage:'点击此处登录'
      }
    },
    created(){
      if(!this.$store.state.user){
        let goLogin = confirm('您还未登录,是否立即登录？');
        if(goLogin){
          this.$router.push({ path: 'login'});
        }
      }else{
        this.user = this.$store.state.user;
        this.messgage = '修改用户信息'
      }
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/user.less';
</style>
