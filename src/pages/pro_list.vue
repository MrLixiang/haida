<template>
  <div>
    <div class="list-page">
      <header>
          <div class="top">
            <i class="scan" v-back></i>
            <SearchBar></SearchBar>
            <i class="message"></i>
          </div>
          <div class="heade">
            <div class="list_top">
              <div class="colligate"  @click="isMoreSort = !isMoreSort">
                <h3>{{sortStyle}}</h3><img :src="pullSrc" alt="snajiao">
              </div>
              <div class="sales" id="orderBy">{{sortText}}</div>
              <div class="sizer"><h3>筛选</h3><img :src="sizerSrc" alt="sizer"></div>
            </div>
          </div>
        </header>
      <ul class="more-sort" id="more-sort" v-show="isMoreSort">
          <li id="zh" @click="sortFn('default',0);" :class="sortStyleClass[0]">综合优先</li>
          <li id="jg" @click="sortFn('price',1);" :class="sortStyleClass[1]">价格优先</li>
          <li id="pl" @click="sortFn('comment',2);" :class="sortStyleClass[2]">评论优先</li>
          <li id="sl" @click="sortFn('sales',3);" :class="sortStyleClass[3] ">销量优先</li>
        </ul>
      <div class="main" id="proList">
        <pro-item v-for="item in proDucts" :key="item.id" :data="item"></pro-item>
      </div>
    </div>
  </div>
</template>

<script>
  import ProItem from '../template/proItem.vue'
  import SearchBar from '../template/searchBar.vue'
  export default {
    name:'proList',
    components:{
      ProItem,
      SearchBar
    },
    data(){
      return{
        pullSrc : require('../img/sanjiao_03.png'),
        sizerSrc : require('../img/xuan_03.png'),
        proImgSrc : require('../img/zhong1_03.png'),
        proDucts: [],
        sortStyleClass : ['on','','',''],
        isMoreSort : false,
        sortStyle : '综合优先',
        sortText : '综合排序',
        api : this.$api+'/haida/admin/proList.php'
      }
    },
    methods:{
      getProductBySearch(search){
        let api = this.api;
        this.axios.get(api,{
          params: {
            getType: 'search',
            search: search,
            num : 8
          }
        }).then(res=>{
          if(res.data){
            this.proDucts = res.data
          }
        })
      },
      getProductDefault(){
        let api = this.api;
        this.axios.get(api,{
          params: {
            getType: 'default',
            num: 8
          }
        }).then(res=>{
          if(res.data){
            this.proDucts = res.data
          }
        })
      },
      sortFn(str,num){
        let api = this.api;
        this.axios.get(api,{
          params: {
            getType: str,
            num: 8,
          }
        }).then(res=>{
          if(res.data){
            this.proDucts = res.data
          }
        });
        switch(num) {
          case num = 0:
            this.sortStyleClass = ['on','','',''];
            this.sortStyle = '综合优先';
            this.sortText = '综合排序';
            break;
          case num = 1:
            this.sortStyleClass = ['','on','',''];
            this.sortStyle = '价格优先';
            this.sortText = '价格排序';
            break;
          case num = 2:
            this.sortStyleClass = ['','','on',''];
            this.sortStyle = '评论优先';
            this.sortText = '评论排序';
            break;
          case num = 3:
            this.sortStyleClass = ['','','','on'];
            this.sortStyle = '销量优先';
            this.sortText = '销量排序';
            break;
        }
        this.isMoreSort = false;
      }
    },
    created(){
      let search = this.$route.query.search;
      if(!search){
        this.getProductDefault();
      }else{
        this.getProductBySearch(search);
      }

    }
  }
</script>

<style scoped lang="less">
  @import '../style/pro_list.less';
</style>
