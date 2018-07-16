import Vue               from 'vue'
import Util              from './utility'
//Modals
import LoginModal        from './components/web/modals/LoginModal'
import RegisterModal     from './components/web/modals/RegisterModal'
//Layouts
import InputSearchLayout from './components/web/layouts/InputSearchLayout'
import FooterLayout      from './components/web/layouts/FooterLayout'
//Pages
import Courses           from './components/web/pages/Courses.vue'
import Blog              from './components/web/pages/Blog.vue'
import Posts             from './components/web/pages/Posts.vue'
import Portfolio         from './components/web/pages/Portfolio.vue'

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
    LoginModal,
    RegisterModal,
    InputSearchLayout,
    FooterLayout,
    Courses,
    Blog,
    Posts,
    Portfolio
  },
}).$mount('#app')