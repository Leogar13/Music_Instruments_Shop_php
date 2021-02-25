<template>
  <listOfProducts :products="getDrumProducts"/>
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
      'getDrumProducts',
    ]),
  },
  mounted() {
    this.$store.dispatch('getDrumProductsAPI');
  },
};
</script>

<style>
</style>

