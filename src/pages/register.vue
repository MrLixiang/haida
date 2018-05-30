<template>
  <div>
    <div class="register-page" >
      <div></div>
      <div class="header">
        <div class="back"  id="back" v-back><img v-bind:src="backSrc" alt="" ></div>
        <div><span>注册页</span></div>
        <div class="message"><img v-bind:src="messageSrc" alt="">
          <p>消息</p></div>
      </div>
      <div class="content" @submit="submit()">
        <form action="" id="registerForm">
          <input type="text" class="username" name="username" placeholder="会员名" v-model="username">
          <input type="password" class="password" name="password" placeholder="密 码" v-model="password">
          <div class="code">
            <input type="text" name="code" placeholder="验证码" v-model="code">
            <span>点击获取</span>
          </div>
          <label><input type="checkbox" name="check" v-model="agree"><span>我已同意海大协议</span></label>
          <div class="submit" @click="submit()">注册</div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name:'register',
    data(){
      return{
        backSrc : require("../img/return.png"),
        messageSrc : require("../img/message.png"),
        username : '',
        password : '',
        code : '',
        agree : false,
        api : this.$api+'/haida/admin/register.php'
      }
    },
    methods:{
      submit(){
        if(!this.username){
          alert("请输入用户名");
          return false
        }
        if(!this.password){
          alert("请输入用户名");
          return false
        }
        if(!this.code){
          alert("请输入验证码");
          return false
        }
        if(!this.agree){
          alert("请同意海大协议");
          return false
        }
        let url = this.api;
        let data = {
          username : this.username,
          password : this.password,
          postType : 'register'
        };
        console.log(data);
        data = this.$qs.stringify(data);
        this.axios.post(url, data).then(res => {
          console.log(res.data);
          let msg = res.data;
          if(msg.status == 1){
            alert("注册成功！,请立即登录");
            this.$router.push({ path: 'login'});
          }else{
            alert(msg.msg)
          }
        })


      }
    }
  }
</script>

<style lang="less" scoped>
  @import '../style/register.less';
</style>
