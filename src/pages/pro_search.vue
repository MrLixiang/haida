<template>
  <div>
    <div class="search-page">
      <header>
        <div class="top">
          <i class="scan"  id="back" v-back ></i>
          <form @submit="searchFn()">
            <input type="text" name="search-content" placeholder="海大珍珠" v-model="search" v-focusIn>
            <div class="btn" @click="searchFn()"></div>
          </form>
          <i class="message"></i>
        </div>
      </header>
      <div class="main" id="main">
        <div class="history">
          <h2>历史搜索</h2>
          <ul class="wire">
            <li><router-link :to="{ name : 'proList' , query : { search : '正品'} }">正品</router-link></li>
          </ul>
        </div>
        <div class="history">
          <h2>搜索发现</h2>
          <ul>
            <li><router-link :to="{ name : 'proList' , query : { search : '珍珠手链'} }">珍珠手链</router-link></li>
            <li><router-link :to="{ name : 'proList' , query : { search : '镶珠吊坠'} }">镶珠吊坠</router-link></li>
            <li><router-link :to="{ name : 'proList' , query : { search : '镶珠耳坠'} }">镶珠耳坠</router-link></li>
            <li><router-link :to="{ name : 'proList' , query : { search : '镶珠耳坠'} }">镶珠耳坠</router-link></li>
            <li><router-link :to="{ name : 'proList' , query : { search : '珍珠工艺品'} }">珍珠工艺品</router-link></li>
          </ul>
        </div>
      </div>
      <div class="footer">
        <button><img :src="phoneSrc" alt="tong"><i>按住   说出你想要的宝贝</i></button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name:'proSearch',
    data(){
      return{
        phoneSrc : require('../img/tong_03.png'),
        search : ''
      }
    },
    methods:{
      searchFn(){
        let search = this.search
        console.log(search);
        if (!search) {
          this.$router.push({ path:'proList' })
        }else{
          search = search.replace(/~\s+/, '');
          this.$router.push({ path:'proList',query :{ search : search } })
        }
      }
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/pro_search.less';
  body{
    background: #fff !important;
  }
</style>
