<template>
  <div>
    <div class="confirm-order-page">
      <div class="header">
        <span class="header-prev"  v-back  ></span>
        <span class="header-confirm">确认订单</span>
        <span>管理</span>
      </div>
      <div class="main">
        <div class="message">
          <span class="message-consignee">收货人：谢先生</span>
          <span>电话：136****4321</span>
          <span class="message-address">
            <span></span>收货地址：广东省广州市天河区五山大道1090号
            <a href="javascript:;" class="message-next"></a>
        </span>
        </div>
        <ul class="news" id="orderItem">

          <li v-for="item in orderData" :key="item.id">
            <img :src="item.img_src" alt="confirm_img.png">
            <div class="news-right">
              <span class="news-content">{{item.title}}</span>
              <span>{{item.subtitle}}</span>
            </div>
            <div class="news-bottom">
              <span class="news-price">￥{{item.price | currency}}</span>
              <div class="news-bottom-center">
                <span class="news-minus" @click="item.num>1?item.num--:item.num">-</span>
                <input type="text" name="amount" value="1" v-model="item.num" class="news-number">
                <span class="news-plus" @click="item.num++">+</span>
              </div>
            </div>
            <div class="mode">
              <span>配送方式</span>
              <span class="mode-act2"></span>
              <span class="mode-act1">快递 免邮</span>
            </div>
            <div class="mode mode-1">
              <span>运费险</span>
              <span class="mode-act2"></span>
              <span class="mode-act1 act1">未选择</span>
            </div>
            <div class="mode mode-1">
              <span>买家留言:</span>
              <span class="mode-act3">选填 填写内容已和卖家协商确认</span>
            </div>
            <div class="mode-2">
          <span class="mode-act5">小计:<i>￥<em class="partPrice" id="partPrice">{{item.price * item.num | currency}}</em></i></span>
              <span class="mode-act4 partAmount">共一件商品</span>
            </div>
          </li>

        </ul>
      </div>
      <div class="footer">
        <span class="footer-submit" id="submitOrder" @click="isPay = !isPay;isPayPrepare = !isPayPrepare">提交订单</span>
        <span class="footer-price">￥<em id="totalPrice">{{ totalPrice | currency}}</em></span>
        <span>合计金额:</span>
      </div>
      <div class="pay" id="pay" v-show="isPay">
        <div  class="background-color"></div>
        <div class="pay-wrap">
          <div class="pay-payment">
            <span class="payment-close" v-back ></span>
            <span class="payment-affirm">确认付款</span>
            <span class="payment-help"></span>
          </div>
          <div v-show="isPayPrepare" class="pay-main" id="pay-main">
            <div class="pay-sum">
              <span class="sum-act1" id="payPrice">￥{{ totalPrice | currency}}</span>
              <span>支付宝账号</span>
              <span class="sum-act2">133******89</span>
            </div>
            <div class="pay-mode">
              <span>付款方式</span>
              <span class="pay-mode-act1">余额宝</span>
              <span class="pay-mode-act2"></span>
            </div>
            <div class="pay-immediate">
              <span class="immediate-act" id="paySure" @click="isPayPrepare=!isPayPrepare;orderSubmit()">立即付款</span>
            </div>
          </div>
          <div v-show="isSuccess" class="pay-success" >
            <div class="pay-mistake">
              <span class="mistake-act1"></span>
              <span class="mistake-act2">付款成功</span>
            </div>
            <div class="failure-immediate">
              <router-link class="immediate-act1" to="order">订单详情</router-link>
              <router-link class="immediate-act1" to="home">继续购物</router-link>
            </div>
          </div>
          <div v-show="isFailure" class="pay-failure" id="pay-failure">
            <div class="pay-mistake">
              <span class="mistake-act1"></span>
              <span class="mistake-act2">付款失败</span>
            </div>
            <div class="failure-immediate">
              <router-link class="immediate-act1" to="order">订单详情</router-link>
              <router-link class="immediate-act1" to="confirmOrder">重新支付</router-link>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</template>

<script>
  export default {
    name:'confirmOrder',
    data(){
      return{
        proImgSrc : require('../img/shop_cart_img1.png'),
        isPay : false,
        isPayPrepare : false,
        isSuccess : false,
        isFailure : false,
        orderData : [],
        api : this.$api+'/haida/admin/confirm_order.php'
      }
    },
    methods : {
      getOrderByID(){
        let api = this.api;
        this.axios.get(api, {
          params: {
            id : this.$route.query.id,
            getType: 'getOrderByID'
          }
        }).then(res => {
          console.log(res.data)
          this.orderData = res.data
        })
      },
      getOrderData(){
        let api = this.api;
        this.axios.get(api, {
          params: {
            getType: 'getOrder'
          }
        }).then(res => {
          console.log(res.data)
          this.orderData = res.data
        })
      },
      orderSubmit(){
        let idArr = [];
        this.orderData.map(item => {
          idArr.push(item.shopcart_id)
        });
        let idStr = idArr.splice('').join(',');
        idStr = `(${idStr})`;
        let url = this.api;
        let data = {
          postType : 'orderSubmit',
          idStr : idStr
        };
        data = this.$qs.stringify(data);
        this.axios.post(url, data).then(res => {
          console.log(res.data);
          if( res.data.status ){
            this.isSuccess = true
          }
          else{
            this.isFailure = true
          }
        })
      },
      resetStatus(){
        let back = confirm('是否放弃支付？')
        if(back){
          let idArr = [];
          this.orderData.map(item => {
            idArr.push(item.shopcart_id)
          });
          let idStr = idArr.splice('').join(',');
          idStr = `(${idStr})`;
          let url = this.api;
          let data = {
            postType : 'init',
            idStr : idStr
          };
          data = this.$qs.stringify(data);
          this.axios.post(url, data).then(res => {
            if(res){
              this.$router.push({path:'home'})
            }
          });

        }
      }
    },
    mounted() {
      if(!this.$store.state.user){
        alert('您还未登录');
        window.history.back();
      }else{
        let id = this.$route.query.id;
        if(id){
          this.getOrderByID()
        }else{
          this.getOrderData()
        }
      }
    },
    computed:{
      totalPrice(){
        let total = 0;
        this.orderData.map(item => {
          total += item.price * item.num
        });
        return total;
      }
    },
    beforeDestroy() {
      this.resetStatus();
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/confirm_order.less';
</style>
