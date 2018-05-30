<template>
  <div>
    <form>
    <input type="text" name="search-content" placeholder="海大珍珠" @focus="goSearch()" >
    <button></button>
  </form>
  </div>
</template>

<script>
  export default {
    name : 'searchComponent',
    methods:{
      goSearch(){
        this.$router.push({ path: 'proSearch'});
      }
    }
  }
</script>

<style scoped lang="less">


</style>
