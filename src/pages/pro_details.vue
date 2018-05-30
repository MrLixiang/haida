<template>
  <div>
    <div class="details-page">
      <header>
        <i class="scan" id="back" v-back></i>
        <SearchBar></SearchBar>
        <i class="message"></i>
      </header>
      <div class="main">
        <div class="deta" id="dataPro">
          <div class="deta-img-bc">
            <img :src="proData.img_src" alt="tu">
          </div>
          <div class="de_top">
            <h2>{{proData.title}}{{proData.subtitle}}</h2>
            <h3>￥<span>{{proData.price}}.00</span></h3>
            <h4><i>快递: <span>0.00</span></i> <i>月销<span>{{proData.sales}}</span>笔</i> <b>广州天河</b></h4>
          </div>
        </div>
        <div class="deta_top">
          <div class="de_mai">
            <div class="integral">
              <i>积分</i>
              <b>购买可得50积分</b>
              <a href="javascript:;"><img :src="selectSrc" alt="jian"> </a>
            </div>
            <div class="quit">
              <i><img :src="trueSrc" alt="que"> <span>过敏包退</span> </i>
              <i><img :src="trueSrc" alt="que"> <span>急速退货</span> </i>
            </div>
            <h1>全程保障，购物无忧</h1>
          </div>
          <div class="de_bot">
            <div class="gml">
              <i>已选: 50g/ml</i>
              <a href="javascript:;"><img :src="selectSrc" alt="jian"> </a>
            </div>
            <div class="ml">
              <i>产品参数</i>
              <a href="javascript:;"><img :src="selectSrc" alt="jian"> </a>
            </div>
          </div>
          <div class="deta_mai">
            <h1>美白肌肤三步骤</h1>
            <h2><i>清洗肌肤</i> <i>滋养肌肤</i> <i>一拍美白</i></h2>
            <div class="fur">
              <h3><i>净</i><b>洗得干净皮肤不紧绷</b></h3>
              <img :src="proMoreImgSrc[0]" alt="tu1">
            </div>
            <div class="fur">
              <h3><i>养</i><b>滋润舒缓 补充多重营养</b></h3>
              <img :src="proMoreImgSrc[1]" alt="tu2">
            </div>
            <div class="fur">
              <h3><i>白</i><b>一拍自然白 遮盖小瑕疵</b></h3>
              <img :src="proMoreImgSrc[2]" alt="tu3">
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="opt1">
          <i></i>
          <b>店铺</b>
        </div>
        <div class="opt2">
          <i></i>
          <b>店铺</b>
        </div>
        <div class="opt3">
          <i></i>
          <b>店铺</b>
        </div>
        <div class="opt4">
          <span id="add" @click="addShopCart()">加入购物车</span>
          <GoBuy :inform="{ id:proData.id , price:proData.price }"></GoBuy>
        </div>
      </footer>
    </div>
  </div>
</template>

<script>
  import SearchBar from '../template/searchBar.vue'
  import GoBuy from '../template/goBuy.vue'
  export default {
    name: 'proDetails',
    components:{
      SearchBar,
      GoBuy
    },
    data() {
      return {
        mainImgSrc: require('../img/tu_03.png'),
        selectSrc: require('../img/jian_03.png'),
        trueSrc: require('../img/que_03.png'),
        proMoreImgSrc: [require('../img/tu1_07.png'), require('../img/tu2_07.png'), require('../img/tu3_07.png')],
        proData : {},
        api : this.$api+'/haida/admin/details.php'
      }
    },
    methods: {
      getDetailById(){
        let id = this.$route.query.id;
        let api = this.api;
        this.axios.get(api, {
          params: {
            id : id,
            getType: 'getDetail'
          }
        }).then(response => {
          console.log(response.data)
          this.proData = response.data[0];
        })
      },

      addShopCart(){
        let url = this.api;
        let data = {
          id : this.proData.id,
          price  : this.proData.price,
          postType : 'add'
        };
        console.log(data);
        data = this.$qs.stringify(data);
        this.axios.post(url, data).then(res => {
          console.log(res.data);
          if( res.data.status == 5 ){
            let go = confirm("您还未登录！是否立即登录？")
            if(go){
              this.$router.push({ path: 'login'});
            }
          }
          else{
            alert(res.data.msg)
          }
        })

      },


    },
    mounted() {
      console.log(this.$route.query);
      this.getDetailById()
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/pro_details.less';
</style>
