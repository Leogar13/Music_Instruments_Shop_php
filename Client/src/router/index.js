import Vue from 'vue';
import Router from 'vue-router';
import AllProducts from '../components/AllProducts';
import DrumProducts from '../components/DrumProducts';
import GuitarProducts from '../components/GuitarProducts';
import Product from '../components/Product';
import CartCheckout from '../components/CartCheckout';
import Login from '../components/Login'

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '',
      name: 'All Products',
      component: AllProducts,
    },
    {
      path: '/drums',
      name: 'Drums',
      component: DrumProducts,
    },
    {
      path: '/guitars',
      name: 'Guitars',
      component: GuitarProducts,
    },
    {
      path: '/product-details',
      name: 'Product',
      component: Product,
    },
    {
      path: '/checkout',
      name: 'Checkout',
      component: CartCheckout,
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
    },
  ],
});
