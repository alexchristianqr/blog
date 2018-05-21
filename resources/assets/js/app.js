import Vue       from 'vue'
import Courses   from './components/pages/home/Courses.vue'
import Portfolio from './components/pages/home/Portfolio.vue'

new Vue({
  components: {Courses, Portfolio},
}).$mount('#app')