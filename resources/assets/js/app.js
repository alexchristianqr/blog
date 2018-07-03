import Vue               from 'vue'
import Axios             from 'axios'
import Courses           from './components/web/pages/Courses.vue'
import Blog              from './components/web/pages/Blog.vue'
import Posts             from './components/web/pages/Posts.vue'
import Portfolio         from './components/web/pages/Portfolio.vue'
import LayoutFooter      from './components/web/layouts/LayoutFooter'
import LayoutInputSearch from './components/web/layouts/LayoutInputSearch'
import LayoutHistory     from './components/web/layouts/LayoutHistory'
import Util              from './utility'

Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

new Vue({
  beforeMount () {
    Util.removeStorage('data_screen')
    let isLarge = (window.screen.availWidth > 768),
      isSmall = (window.screen.availWidth <= 768),
      isTablet = (window.screen.availWidth <= 768 && window.screen.availWidth > 425),
      isMobile = (window.screen.availWidth <= 425)
    Util.setStorage('data_screen', {
      isComputer: isLarge,
      isSmall: isSmall,
      isTablet: isTablet,
      isMobile: isMobile,
    })
  },
  components: {
    Courses,
    Portfolio,
    Posts,
    Blog,
    LayoutFooter,
    LayoutInputSearch,
    LayoutHistory,
  },
}).$mount('#app')