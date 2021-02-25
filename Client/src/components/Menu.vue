<template>
  <header class="header">
    <nav class="nav">
      <ul class="nav-links">
        
        <li class="link">
          <router-link to="/">AllProducts</router-link>
        </li>
        <li class="link">
          <router-link to="/guitars">Guitar</router-link>
        </li>
        <li class="link">
          <router-link to="/drums">Drum</router-link>
        </li>        
        <li class="link">
          <router-link to="/login">Login</router-link>
        </li>
        
      </ul>
    </nav>
    <slot></slot>
  </header>
  
</template>

<script>
export default {
};
</script>

<style scoped>
  .b {
  position: absolute;
  left: auto;
  width: 100px;
  height: 120px;
  border: 3px solid blue;
} 

  .header {
    width: 100%;
    height: 70px;
    background-color: #333333;
    box-sizing: border-box;
    padding: .5em;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .nav {
    width: 600px;
  }

  .nav-links {
    width: 100%;
    display: flex;
    justify-content: flex-start;
  }

  .link {
    list-style: none;
    padding: 0 2em;
  }

  .link a {
    color: #fff;
    text-decoration: none;
  }
</style>
