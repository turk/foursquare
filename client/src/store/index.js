import Vue from 'vue';
import Vuex from 'vuex';
import CategoryService from '../services/http/CategoryService';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    categories: {
      items: [],
      total: 0,
    },
    venues: {
      items: [],
      total: 0,
      isLoading: false,
    },
  },
  mutations: {
    UPDATE_CATEGORIES: (state, data) => {
      state.categories.items = data.items;
      state.categories.total = data.total;
    },
    UPDATE_VENUES: (state, data) => {
      state.venues.items = data.items;
      state.venues.total = data.total;
    },
    CLEAR_VENUES: (state) => {
      console.log('CLEAR_VENUES');
      state.venues.items = [];
      state.venues.total = 0;
    },
    UPDATE_VENUES_LOADING_STATUS: (state, status) => {
      state.venues.isLoading = status;
    },
  },
  actions: {
    fetchCategories({ commit }) {
      CategoryService.getCategories().then((result) => {
        commit('UPDATE_CATEGORIES', result.data.data);
      });
    },
    fetchVenues({ commit }, { near, category }) {
      commit('UPDATE_VENUES_LOADING_STATUS', true);
      commit('CLEAR_VENUES');
      CategoryService.getVenues(near, category).then((result) => {
        commit('UPDATE_VENUES_LOADING_STATUS', false);
        commit('UPDATE_VENUES', result.data.data);
      });
    },
  },
  modules: {
  },
});
