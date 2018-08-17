<template>
    <div class="ssk-sticky ssk-left ssk-center ssk-lg ssk-group ssk-count">
        <a href="" class="ssk ssk-facebook" @click="initialize"></a>
        <a href="" class="ssk ssk-twitter"></a>
        <a href="" class="ssk ssk-google-plus"></a>
        <a href="https://github.com/acqrdeveloper" target="_blank" class="ssk ssk-github"></a>
        <a href="https://wa.me/51955588297?text=Hola @AlexChristian" target="_blank" class="ssk ssk-whatsapp"></a>
    </div>
</template>

<script>
    import $ from 'jquery'
    import 'social-share-kit'

    export default {
        name: 'SocialShareKitLayout',
        data: () => ({
            dataKit: {},
        }),
        created(){
            // Get data from metas
            this.initialize()
        },
        methods: {
            initialize(){
                $(document).ready(()=>{
                    this.dataKit.url = $('meta[property="og:url"]').attr('content')
                    this.dataKit.image = $('meta[property="og:image"]').attr('content')
                    this.dataKit.title = $('meta[property="og:title"]').attr('content')
                    this.dataKit.text = $('meta[property="og:description"]').attr('content')
                    //Initialize SocialShareKit
                    SocialShareKit.init({
                        twitter: this.dataKit,
                        facebook: this.dataKit,
                        google: this.dataKit,
                    })
                })
            },
        },
    }
</script>

<style scoped>

</style>