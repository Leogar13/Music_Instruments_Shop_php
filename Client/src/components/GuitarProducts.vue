<template>
  <listOfProducts :products="getGuitarProducts"/>
</template>

<script>
import { mapGetters } from 'vuex';
import listOfProducts from './ListOfProducts';

export default {
  components: {
    listOfProducts,
  },
  computed: {
      ...mapGetters([
      'getGuitarProducts',
    ]),
  },
  mounted() {
    this.$store.dispatch('getGuitarProductsAPI');
  },
};
</script>

<style>
</style>

