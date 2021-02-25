<template>
 <div class="form-login">
   <form class="login" @submit.prevent="login">
     <h1>Sign in</h1>
     <label>Email</label>
     <input required v-model="email" type="email" placeholder="Name"/>
     <label>Password</label>
     <input required v-model="password" type="password" placeholder="Password"/>
     <hr/>
     <button type="submit" >Login</button>
   </form>
 </div>
</template>

<script>
import router from '../router/index';
  export default {

    data() {
      return {
        email : "",
        password : ""
      }
    },
    methods: {
      login : function() {
        let email = this.email
        let password = this.password
        this.$store.dispatch('login', { email, password })
       .then(() => this.$router.push('/'))
       .catch(err => console.log(err));
      //   this.$store.dispatch('login', { email, password })
      },
    },
  }
</script>

<style scoped>
  .form-login {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -50px;
    margin-left: -50px;
    width: 100px;
    height: 100px;
  }
</style>