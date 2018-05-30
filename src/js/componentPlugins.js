import Vue from 'vue'


const MyPlugin = {};

MyPlugin.install = (Vue, options) => {

  Vue.component('footer-btn', {
    template: `<footer>
              <router-link to="home">
                <i></i>
                <b>首页</b>
              </router-link>
              <router-link to="proCategories">
                <i></i>
                <b>分类</b>
              </router-link>
              <router-link to="shopCart">
                <i></i>
                <b>购物车</b>
              </router-link>
              <router-link to="user">
                <i></i>
                <b>个人</b>
              </router-link>
            </footer>`
  });

  Vue.filter('currency', v => {
      v = v * 1;
      return v.toFixed(2)
    }
  );

  Vue.directive('back', {
    inserted: (el) => {
      el.onclick = () => {
        window.history.back();
      }
    }
  });

  Vue.directive('focusIn', {
    inserted: (el) => {
      el.focus();
    }
  })


};

export default MyPlugin;
