import Vue from 'vue'
import $   from 'jquery'
import 'social-share-kit'
import 'bootstrap'

/**
 * Uncomment below when compiling to production
 */
Vue.config.devtools = false
Vue.config.debug = false
Vue.config.silent = true

new Vue({
    created(){
        this.load()
    },
    methods: {
        load(){
            this.initFacebook()
            this.initShareKit()
        },
        initFacebook(){
            window.fbAsyncInit = () =>{
                FB.init({
                    appId: '481663735685291',
                    xfbml: true,
                    version: 'v3.1',
                })
                FB.AppEvents.logPageView()
            };
            (function(d, s, id){
                let js, fjs = d.getElementsByTagName(s)[0]
                if(d.getElementById(id)){return}
                js = d.createElement(s)
                js.id = id
                js.src = 'https://connect.facebook.net/en_US/sdk.js'
                fjs.parentNode.insertBefore(js, fjs)
            }(document, 'script', 'facebook-jssdk'))
        },
        initShareKit(){
            $(document).ready(() =>{
                SocialShareKit.init()
            })
        },
    },
}).$mount('#app')