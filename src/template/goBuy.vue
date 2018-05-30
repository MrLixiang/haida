<template>

    <span class="buy" @click="goBuy()">立即购买</span>

</template>

<script>
  export default {
    name : 'buyComponent',
    props:[
      'inform'
    ],
    data(){
      return {
        api : this.$api+'/haida/admin/confirm_order.php'
      }
    },
    methods:{
      goBuy(){
        console.log(this.inform.id)
        console.log(this.inform.price)
        let api = this.api;
        this.axios.get(api, {
          params: {
            id : this.inform.id,
            get : 'confirmById'
          }
        }).then( res => {
          if(res.data.status == 0){
            let go = confirm("您还未登录！是否立即登录？")
            if(go){
              this.$router.push({ path: 'login'});
            }
          }else{
            let url = this.api;
            let data = {
              postType :'addOrderById',
              proId : this.inform.id,
              num : 1,
              price : this.inform.price
            };
            data = this.$qs.stringify(data);
            this.axios.post(url, data).then(response => {
              if(response.data.status == 1){
                this.$router.push({ path:'confirmOrder',query :{ id : this.inform.id } })
              }
            })
          }
        })
      }
    }
  }
</script>

<style scoped lang="less"></style>
