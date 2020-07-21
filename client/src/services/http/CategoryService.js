import Vue from 'vue';
import HttpService from './HttpService';

class CategoryService extends HttpService {
  getCategories() {
    return this.http.get('categories')
      .then((response) => response)
      .catch((e) => {
        Vue.notify({
          type: 'error',
          group: 'app',
          title: 'Error!',
          text: 'There is an error! Please try again',
        });

        return Promise.reject(e);
      });
  }

  getVenues(near, category) {
    return this.http.get(`categories/recommended-venues-by-near?near=${near}&category=${category}`)
      .then((response) => response)
      .catch((e) => {
        Vue.notify({
          type: 'error',
          group: 'app',
          title: 'Error!',
          text: 'There is an error! Please try again',
        });

        return Promise.reject(e);
      });
  }
}

export default new CategoryService();
