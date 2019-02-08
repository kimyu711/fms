import Vue from 'vue';

import TestComponent from './vue/TestComponent';

var app = new Vue({
  el: '#vue-container',
  components: {
    TestComponent
  }
});
