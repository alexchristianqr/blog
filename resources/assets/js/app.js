import Vue          from 'vue'
import Courses      from './components/pages/home/Courses.vue'
import Portfolio    from './components/pages/home/Portfolio.vue'
import FooterLayout from './components/layouts/FooterLayout'
import NavLayout from './components/layouts/NavLayout'
import Util         from './utility'

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
  components: {Courses, Portfolio,FooterLayout,NavLayout},
  mounted(){
    console.log(Util.getStorage('data_screen'))
  },
}).$mount('#app')