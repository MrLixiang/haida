
<template>
  <div>
    <div class="order-page">
      <header>
        <div class="back"  id="back" v-back></div>
        <h1>我的订单</h1>
        <div class="more"></div>
      </header>
      <div class="middle">
        <ul class="nav" id="nav">
          <li class="on"><span>全部</span></li>
          <li><span>待付款</span></li>
          <li><span>待发货</span></li>
          <li><span>待收货</span></li>
          <li><span>待评价</span></li>
        </ul>
        <div class="order-option">
          <div class="status">等待买家付款</div>
          <span class="detail">
            <img :src="orderImgOne" alt="order1">
            <span class="title">水密码海泉精华套装正品女士冬季补水保湿水乳丹姿护肤品三件套</span>
            <span class="price">￥<em>169.00</em></span>
            <i class="amount">数量：<em>1</em></i>
        </span>
          <div class="total">
            <span class="amount">共<em>1</em>件商品</span>
            <span class="price">合计￥<em>169.00</em></span>
            <span>（含运费￥<em>0.00</em>）</span>
          </div>
          <div class="operate">
            <span>取消订单</span>
            <span class="on">付款</span>
          </div>
        </div>
        <div class="order-option">
          <div class="status">交易成功</div>
          <div class="detail">
            <img :src="orderImgTwo" alt="order2">
            <span class="title">欧莱雅男士劲能醒肤露滋润补水保湿面霜乳液护肤品冬擦脸油润肤霜</span>
            <span class="price">￥<em>189.00</em></span>
            <i class="amount">数量：<em>1</em></i>
          </div>
          <div class="total">
            <span class="amount">共<em>1</em>件商品</span>
            <span class="price">合计￥<em>189.00</em></span>
            <span>（含运费￥<em>0.00</em>）</span>
          </div>
          <div class="operate">
            <span>查看物流</span>
            <span>追加评价</span>
          </div>
        </div>
      </div>
      <footer>
        <div class="option1" >
          <i></i>
          <b>首页</b>
        </div>
        <div class="option2" >
          <i></i>
          <b>分类</b>
        </div>
        <div class="option3" >
          <i></i>
          <b>购物车</b>
        </div>
        <div class="option4" >
          <i></i>
          <b>个人</b>
        </div>
      </footer>
    </div>
  </div>
</template>

<script>
  export default {
    name:'order',
    data(){
      return{
        orderImgOne : require("../img/order_img1.png"),
        orderImgTwo : require("../img/order_img2.png"),
      }
    },
    mounted(){
      if(!this.$store.state.user){
        let goLogin = confirm('您还未登录,是否立即登录？');
        if(goLogin){
          this.$router.push({ path: 'login'});
        }
      }
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/order.less';
</style>
