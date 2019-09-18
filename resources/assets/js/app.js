// const BootstrapEmail = require('bootstrap-email');
// import BootstrapEmail from 'bootstrap-email'
// const template = new BootstrapEmail({
//   template: './resources/views/templates/subscription/file.html'
// });
// template.compileAndSave('./public/dist/plantilla.html');

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
        let doc = document.location.pathname.replace('/','').split('/')
        if(doc.length == 5 && doc[0] == 'blog' && doc[1] == 'post'){
            this.initFacebook()
            this.initShareKit()
        }
    },
    methods: {
        initFacebook(){
            window.fbAsyncInit = () => {
                FB.init({
                    appId: '481663735685291',
                    xfbml: true,
                    version: 'v3.1',
                })
                FB.AppEvents.logPageView()
            };
            (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0]
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