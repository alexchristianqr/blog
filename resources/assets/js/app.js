import Vue          from 'vue'
import Axios          from 'axios'
import Courses      from './components/pages/home/Courses.vue'
import Blog      from './components/pages/home/Blog.vue'
import Posts        from './components/pages/home/Posts.vue'
import Portfolio    from './components/pages/home/Portfolio.vue'
import FooterLayout from './components/layouts/FooterLayout'
import NavLayout    from './components/layouts/NavLayout'
import InputSearch  from './components/layouts/InputSearch'
import PostsHistory from './components/layouts/PostsHistory'
import Util         from './utility'

Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

new Vue({
  data: () => ({}),
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
    FooterLayout,
    NavLayout,
    InputSearch,
    Posts,
    Blog,
    PostsHistory,
  },
}).$mount('#app')