import Vue                  from 'vue'
import Axios                from 'axios'
import Util                 from './utility'
//Modals
import LoginModal           from './components/web/modals/LoginModal'
import RegisterModal        from './components/web/modals/RegisterModal'
//Layouts
import InputSearchLayout    from './components/web/layouts/InputSearchLayout'
import FooterLayout         from './components/web/layouts/FooterLayout'
//Pages
import Courses              from './components/web/pages/Courses.vue'
import Blog                 from './components/web/pages/Blog.vue'
import Posts                from './components/web/pages/Posts.vue'
import Portfolio            from './components/web/pages/Portfolio.vue'
//Plugins
import 'social-share-kit'

Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

new Vue({
    beforeMount(){
        this.getSizeScreen()
    },
    components: {
        LoginModal,
        RegisterModal,
        InputSearchLayout,
        FooterLayout,
        Courses,
        Blog,
        Posts,
        Portfolio,
    },
    created(){
      SocialShareKit.init()
    },
    methods: {
        getSizeScreen(){
            Util.removeStorage('data_screen')
            let isLarge = (window.screen.availWidth > 768),
                isSmall = (window.screen.availWidth <= 768),
                isTablet = (window.screen.availWidth <= 768) && (window.screen.availWidth > 425),
                isMobile = (window.screen.availWidth <= 425)
            Util.setStorage('data_screen', {
                isComputer: isLarge,
                isSmall: isSmall,
                isTablet: isTablet,
                isMobile: isMobile,
            })
        },
    },
}).$mount('#app')