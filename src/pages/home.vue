<template>
  <div>
    <div class="home-page">
      <header>
        <div class="scan"></div>
        <SearchBar></SearchBar>
        <div class="message"></div>
      </header>
      <div class="banner">
        <ul>
          <li><a href="javascript:;"><img :src="bannerOne"></a></li>
          <li><a href="javascript:;"><img :src="bannerTwo"></a></li>
          <li><a href="javascript:;"><img :src="bannerThree"></a></li>
        </ul>
        <ol>
          <li></li>
          <li></li>
          <li></li>
        </ol>
      </div>
      <ul class="nav">
        <li>
          <img :src="homeNavOne" alt="nav1">
          <span>热卖推荐</span>
        </li>
        <li>
          <img :src="homeNavTwo" alt="nav2">
          <span>爆款商品</span>
        </li>
        <li>
          <img :src="homeNavThree" alt="nav3">
          <span>最新商品</span>
        </li>
        <li>
          <img :src="homeNavFour" alt="nav1">
          <span>推荐商品</span>
        </li>
      </ul>
      <div class="headline">
        <b>珍 珠 头 条</b>
        <i href="javascript:;">珍珠都有哪些种类?</i>
        <img :src="headlineSrc" alt="headline">
      </div>
      <div class="middle" id="middle">
        <div class="hot">
          <img :src="hotSrc" alt="hot-img">
          <h3>热卖推荐</h3>
          <!--<a class="title-main" href="javascript:;">深层补水 畅饮水润<br>让你的肌肤“喝饱”水</a>-->
          <router-link class="title-main" :to="{ name : 'proDetails' , query : { id : 6} }">深层补水 畅饮水润<br>让你的肌肤“喝饱”水</router-link>
          <b class="title">水漾肌蜜三件套</b>
          <b class="price">￥<em>247</em>.00</b>
          <GoBuy :inform="{ id:6 , price:247 }"></GoBuy>
        </div>
        <div class="boom">
          <h3>爆款商品</h3>
          <img :src="boomSrc" alt="boom-img">
          <router-link class="title-main"  :to="{ name : 'proDetails' , query : { id : 7} }">在最美的年龄<br>拒绝加“斑”</router-link>
          <b class="title">控油“神器”三件套</b>
          <b class="price">￥<em>98</em>.00</b>
          <GoBuy :inform="{ id:7 , price:1350 }"></GoBuy>
        </div>
        <div class="new">
          <h3>爆款商品</h3>
          <img :src="newSrc" alt="new-img">
          <router-link class="title-main" href="javascript:;" :to="{ name : 'proDetails' , query : { id : 8} }">魅惑价值 尽享奢华<br>品味女士的最爱</router-link>
          <b class="title">来自深海的璀璨</b>
          <b class="price">￥<em>1743</em>.00</b>
          <GoBuy :inform="{ id:8 , price:1743 }"></GoBuy>
        </div>
      </div>
      <div class="guess" id="guess">
        <h3>猜你喜欢</h3>
        <ul>
          <li>
            <router-link class="img" :to="{ name : 'proDetails' , query : { id : 9} }"><img :src="guessOne" alt="guess1"></router-link>
            <b>奢华高贵</b>
            <GoBuy :inform="{ id:9 , price:152 }"></GoBuy>
          </li>
          <li>
            <router-link  class="img" :to="{ name : 'proDetails' , query : { id : 9} }"><img :src="guessTwo" alt="guess2"></router-link>
            <b>精致奢华</b>
            <GoBuy :inform="{ id:9 , price:152 }"></GoBuy>
          </li>
        </ul>
      </div>

      <footer-btn></footer-btn>

    </div>
  </div>
</template>

<script>
  import SearchBar from '../template/searchBar.vue'
  import GoBuy from '../template/goBuy.vue'
  export default {
    name:'home',
    components:{
      SearchBar,
      GoBuy
    },
    data(){
      return{
        bannerOne : require('../img/banner1.png'),
        bannerTwo : require('../img/banner2.png'),
        bannerThree : require('../img/banner3.png'),
        homeNavOne : require('../img/home_nav1.png'),
        homeNavTwo : require('../img/home_nav2.png'),
        homeNavThree : require('../img/home_nav3.png'),
        homeNavFour : require('../img/home_nav4.png'),
        headlineSrc : require('../img/home_headline.png'),
        hotSrc : require('../img/home_hot_img.png'),
        boomSrc : require("../img/home_boom_img.png"),
        newSrc : require('../img/home_new_img.png'),
        guessOne : require('../img/home_guess_img1.png'),
        guessTwo : require('../img/home_guess_img2.png')
      }
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/home.less';
</style>
