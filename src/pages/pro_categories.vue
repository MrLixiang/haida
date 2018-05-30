<template>
  <div>
    <div class="categories-page">
      <header>
        <div class="scan"  id="back" v-back></div>
        <SearchBar></SearchBar>
        <div class="message"></div>
      </header>
      <ul class="nav">
        <li class="on">珍珠化妆品</li>
        <li>海水珍珠粉</li>
        <li>珍珠项链</li>
        <li>珍珠耳坠</li>
      </ul>
      <div class="main">
        <ul class="sear_below" id="sear_below">
          <li><router-link to="proList"><img :src="categoriesOne" alt="hua1"><div>丹姿护肤品套装</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesTwo" alt="hua2"><div>芳草集蓝色清新</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesThree" alt="hua3"><div>丹姿蓝色系列</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesFour" alt="hua4"><div>欧莱雅精华套装</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesFive" alt="hua5"><div>雅诗兰黛护肤品</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesSix" alt="hua6"><div>蓝色珀莱雅护肤品</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesSeven" alt="hua7"><div>温碧泉护肤套装</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesEight" alt="hua8"><div>vichy护肤品</div></router-link></li>
          <li><router-link to="proList"><img :src="categoriesNine" alt="hua9"><div>兰蔻精华肌底霜</div></router-link></li>
        </ul>
      </div>
      <footer-btn></footer-btn>
    </div>
  </div>
</template>

<script>
  import SearchBar from '../template/searchBar.vue'
  export default {
    name:'proCategories',
    components:{
      SearchBar
    },
    data(){
      return{
        categoriesOne : require('../img/hua1_03.png'),
        categoriesTwo : require('../img/hua2_03.png'),
        categoriesThree : require('../img/hua3_03.png'),
        categoriesFour : require('../img/hua4_03.png'),
        categoriesFive : require('../img/hua5_03.png'),
        categoriesSix : require('../img/hua6_03.png'),
        categoriesSeven : require('../img/hua7_03.png'),
        categoriesEight : require('../img/hua8_03.png'),
        categoriesNine : require('../img/hua9_03.png'),
      }
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/pro_categories.less';
</style>
