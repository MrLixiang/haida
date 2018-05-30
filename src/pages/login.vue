<template>
  <div>
  <div class="login-page" >
    <div class="header">
      <div class="back"  id="back" v-back><img :src="backSrc" alt=""></div>
      <div><span>登录页</span></div>
      <div class="message"><img :src="messageSrc" alt="">
        <p>消息</p></div>
    </div>
    <div class="content">
      <form action="" id="login">
        <input type="text" placeholder="会员名" name="username" v-model="username">
        <input type="password" placeholder="密 码" name="password" v-model="password">
        <div>
          <router-link class="Login" to="register">一键注册</router-link>
          <a href="javascript:;" class="forget">忘记密码</a>
        </div>
        <span class="submit" @click="login()">登录</span>
      </form>
    </div>
    <div class="footer">
      <h3>一键登录</h3>
      <div class="footer-div">
        <div class="qq"><img :src="qqSrc" alt=""><a href="javascript:;">QQ登录</a></div>
        <div class="wechat"><img :src="weiSrc" alt=""><a href="javascript:;">微信登录</a></div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  export default {
    name:'login',
    data(){
      return{
        backSrc : require("../img/return.png"),
        messageSrc : require("../img/message.png"),
        qqSrc : require("../img/QQ.png"),
        weiSrc : require("../img/WeChat.png"),
        username: '',
        password : '',
        api : this.$api+'/haida/admin/login.php'
      }
    },
    methods : {
      login(){
        if(!this.username){
          alert('请输入用户名');
          return false;
        }
        if(!this.password){
          alert('请输入密码');
          return false;
        }
        let url = this.api;
        let data = {
          username : this.username,
          password : this.password,
          postType : 'login',
        };
        data = this.$qs.stringify(data);
        this.axios.post(url, data).then(res => {
          console.log(res.data);
          let msg = res.data;
          if(msg.status == 1){
            alert("登录成功！");
            this.$store.state.user = this.username;
            this.$router.push({ path: 'home'});
          }else{
            alert(msg.msg)
          }
        })
      }
    }
  }
</script>

<style lang="less" scoped>
@import '../style/login.less';
</style>
