import Vue from 'vue';
import Vuex from 'vuex';
import router from './router/index'
import axios from 'axios';
// import VueAxios from 'vue-axios';

Vue.use(Vuex);
axios.defaults.adapter = require('axios/lib/adapters/http');
// Vue.use(VueAxios, axios);

export default new Vuex.Store({
  state: {
    productAPI: [],
    guitarAPI: [],
    drumAPI: [],
    notebooks: [
      {
        name: 'Notebook Lenovo Ideapad 320 Intel® Core i5-7200u 8GB',
        price: 2259,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/132381/3/132381386G1.png',
        stars: 5,
        totalReviews: 230,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Notebook Dell Inspiron i15-3567-A30P Intel Core 7ª i5 4GB',
        price: 2284,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/133280/7/133280747G1.jpg',
        stars: 3.4,
        totalReviews: 20,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Notebook Samsung Essentials E21 Intel Celeron Dual Core',
        price: 1490,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/132165/8/132165801G1.jpg',
        stars: 1,
        totalReviews: 1,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Notebook Samsung Expert X22 Intel Core 7 i5 8GB',
        price: 2307,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/132260/6/132260681G1.jpg',
        stars: 4.4,
        totalReviews: 340,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Notebook VAIO Fit 15S B1211B Intel Core i5 4GB',
        price: 2599,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/133252/7/133252789G1.jpg',
        stars: 3,
        totalReviews: 30,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Notebook Dell Alienware - i7 16GB',
        price: 14000,
        image: 'https://images-submarino.b2w.io/produtos/01/00/sku/34470/9/34470934G1.jpg',
        stars: 2,
        totalReviews: 248,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
    ],

    smartphones: [
      {
        name: 'Smartphone Xiaomi Mi A1 dual Android one 7.1',
        price: 1199,
        image: 'https://images-americanas.b2w.io/produtos/01/00/sku/29296/2/29296259G1.jpg',
        stars: 0,
        totalReviews: 0,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Smartphone Moto G 5S Dual Chip Android 7.0',
        price: 929,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/132474/0/132474081G1.png',
        stars: 1.5,
        totalReviews: 11,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'iPhone 8 Dourado 64GB Tela 4.7" IOS 11',
        price: 3949,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/132651/7/132651745G1.jpg',
        stars: 1,
        totalReviews: 2,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Smartphone Samsung Galaxy S7 Edge',
        price: 1943,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/125911/8/125911828G1.png',
        stars: 5,
        totalReviews: 310,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Smartphone Motorola Moto G6 Plus',
        price: 1699,
        image: 'https://images-americanas.b2w.io/produtos/01/00/item/133453/1/133453185G1.jpg',
        stars: 2.9,
        totalReviews: 42,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
      {
        name: 'Smartphone Motorola Moto Z3 Play',
        price: 2999,
        image: 'https://images-submarino.b2w.io/produtos/01/00/item/133666/1/133666164G1.jpg',
        stars: 0.5,
        totalReviews: 1,
        details: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
      },
    ],
    mybill: [],
    cartProducts: [],
    currentProduct: {},
    showModal: false,
    showPopupCart: false,
    token: '',
    user: {},
    localhostAddress: 'http://localhost:80/ThayAn/',
  },

  getters: {
    getNotebooks: state => state.notebooks,
    getSmartphones: state => state.smartphones,
    getAllProducts: state => state.productAPI,
    getGuitarProducts: state => state.guitarAPI,
    getDrumProducts: state => state.drumAPI,
    getProductsInCart: state => state.cartProducts,
    getCurrentProduct: state => state.currentProduct,
    getShowModal: state => state.showModal,
    getPopupCart: state => state.showPopupCart,
    getLocalHostAddress: state => state.localhostAddress,
    getUserInfor: state => state.user,
    getToken: state => state.token,
    getMybill: state => state.mybill,
  },

  mutations: {
    ADD_PRODUCT: (state, product) => {
      state.cartProducts.push(product);
    },
    REMOVE_PRODUCT: (state, index) => {
      state.cartProducts.splice(index, 1);
    },
    CURRENT_PRODUCT: (state, product) => {
      state.currentProduct = product;
    },
    SHOW_MODAL: (state) => {
      state.showModal = !state.showModal;
    },
    SHOW_POPUP_CART: (state) => {
      state.showPopupCart = !state.showPopupCart;
    },
    GETALL_PRODUCT: (state, data) => {
      state.productAPI = data;
    },
    GETGUITAR_PRODUCT: (state, data) => {
      state.guitarAPI = data;
    },
    GETDRUM_PRODUCT: (state, data) => {
      state.drumAPI = data;
    },
    ADD_MYBILL: (state, data) => {
      state.mybill = data;
    },
    ADD_USER: (state, data) => {
      state.user = data;
    },
    ADD_TOKEN: (state, data) => {
      state.token = data;
    },
  },

  actions: {
    addProduct: (context, product) => {
      context.commit('ADD_PRODUCT', product);
    },
    removeProduct: (context, index) => {
      context.commit('REMOVE_PRODUCT', index);
    },
    currentProduct: (context, product) => {
      context.commit('CURRENT_PRODUCT', product);
    },
    showOrHiddenModal: (context) => {
      context.commit('SHOW_MODAL');
    },
    showOrHiddenPopupCart: (context) => {
      context.commit('SHOW_POPUP_CART');
    },
    login({ commit, state }, user) {
      return new Promise((resolve, reject) => {
        // commit('auth_request')
        axios({ url: `${state.localhostAddress}client/login.php`, data: user, method: 'POST' })
        .then((response) => {
          commit('ADD_TOKEN', response.data.token);
          console.log(response);
          router.push('/');
        })
        .catch(err => {
          console.log(err);
          // commit('auth_error')
          // localStorage.removeItem('token')
          // reject(err)
        });
      });
    },
    getAllProductsAPI({ commit, state }) {
      axios.get(`${state.localhostAddress}client/display/allproduct.php`, { headers: {
        'Content-Type': 'application/json; charset=UTF-8',
      } }, { useCredentails: true }).then((response) => {
        commit('GETALL_PRODUCT', response.data);
      });
    },
    getGuitarProductsAPI({ commit, state }) {
      axios.get(`${state.localhostAddress}client/display/guitarproduct.php`, { headers: {
        'Content-Type': 'application/json; charset=UTF-8',
      } }, { useCredentails: true }).then((response) => {
        commit('GETGUITAR_PRODUCT', response.data);
      });
    },
    getDrumProductsAPI({ commit, state }) {
      axios.get(`${state.localhostAddress}client/display/drumproduct.php`, { headers: {
        'Content-Type': 'application/json; charset=UTF-8',
      } }, { useCredentails: true }).then((response) => {
        commit('GETDRUM_PRODUCT', response.data);
      });
    },
    postCartAPI: (context, state) => {
      // axios.post(`${context.getters.getLocalHostAddress}client/display/getCart.php`, {
        // axios.post(`${context.getters.getLocalHostAddress}client/login_checked.php`, {
          axios.post(`${context.getters.getLocalHostAddress}client/postcart.php`, {  
        data: context.getters.getProductsInCart,
      }, { headers: {
        'Content-Type': 'application/json; charset=UTF-8',
        'Authorization' : context.getters.getToken,
      },}).then((response) => {
        // console.log(response.data.bill);
        // commit('ADD_MYBILL', response.data.bill);
        return response.data.bill;
      }).catch((e) => {
        console.log(e);
      });
    },
  },
});
