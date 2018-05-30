<template>
  <div>
    <div class="shopcart-page">
      <header>
        <div class="back" id="back" v-back></div>
        <h1>购物车（<em id="shopCartNum">{{shopCartLength}}</em>）</h1>
        <div class="more">管理</div>
      </header>
      <ul class="list" id="shopCart">
        <li v-for="item in shpCartData" :key="item.id">
          <input class="check" type="checkbox" :checked="item.isCheck" @click="item.isCheck = !item.isCheck">
          <router-link class="img" :to="{ name : 'proDetails' , query : { id : item.id} }"><img :src="item.img_src" alt="shopCartImg" ></router-link>
          <router-link class="title" :to="{ name : 'proDetails' , query : { id : item.id} }">{{item.title}}{{item.subtitle}}</router-link>
          <span class="price">￥<em>{{item.price | currency}}</em></span>
          <div class="amount">
            <i class="reduce" @click="item.num>1?item.num--:item.num;changNum(item.id,item.num)">-</i>
            <input class="num" type="text" v-model="item.num" name="amount" >
            <i class="add" @click="item.num++;changNum(item.id,item.num)">+</i>
          </div>
        </li>
      </ul>
      <div class="total">
        <label>
          <input type="checkbox" class="check-all" :checked="isCheckAll" @click="checkAll()">
          <b>全选</b>
        </label>
        <span class="submit" @click="submitOrder()" >结算</span>
        <span class="price">合计：￥<em id="totalPrice">{{totalPrice | currency}}</em></span>
      </div>
      <footer-btn></footer-btn>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'shopCart',
    data() {
      return {
        proImgSrc : require('../img/shop_cart_img1.png'),
        shpCartData : [],
        timer : null,
        api : this.$api+'/haida/admin/shopCart.php'
      }
    },
    methods : {
      getShopCartData(){
        let api = this.api;
        this.axios.get(api, {
          params: {
            getType: 'getShopcart'
          }
        }).then(res => {

          if(res.data){
            res.data.map( item => { return item.isCheck = true });
            this.shpCartData = res.data;
          }

        })
      },
      checkAll(){
        if(this.isCheckAll){
          this.shpCartData.map( item => {
            item.isCheck = false
          })
        }else{
          this.shpCartData.map(item=>{
            item.isCheck = true
          })
        }
      },
      changNum(id,num){
        if(this.timer){
          clearTimeout(this.timer)
        }
        this.timer = setTimeout(()=>{
          let url = this.api;
          let data = {
            id : id,
            num : num,
            postType : 'changeNum'
          };
          data = this.$qs.stringify(data);
          this.axios.post(url, data).then(res => {
            console.log(res.data);
          })
        },500)


      },
      submitOrder(){
        let idArr = [];
        this.shpCartData.map(item => {
          if(item.isCheck){
            idArr.push(item.shopcart_id)
          }
        });
        let idStr = idArr.splice('').join(',');
        idStr = `(${idStr})`;
        console.log(idStr);
        let url = this.api;
        let data = {
          idStr : idStr,
          postType : 'submit'
        };
        data = this.$qs.stringify(data);
        this.axios.post(url, data).then(res => {
          if(res.data.status){
            this.$router.push({ path:'confirmOrder' })
          }
        })
      }

    },
    mounted(){
      if(!this.$store.state.user){
        let goLogin = confirm('您还未登录,是否立即登录？');
        if(goLogin){
          this.$router.push({ path: 'login'});
        }
      }else{
        this.getShopCartData();
      }
    },
    computed:{
      shopCartLength(){
        return this.shpCartData.length
      },
      isCheckAll(){
        return this.shpCartData.every(item => {
          if(item.isCheck){
            return item.isCheck
          }
        })
      },
      totalPrice(){
        let total = 0;
        this.shpCartData.map(item => {
          if(item.isCheck){
            total += item.price * item.num
          }
        });
        return total;
      }
    },


  }
</script>

<style lang="less" scoped>
  @import '../style/shop_cart.less';
</style>
