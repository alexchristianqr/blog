<template>
    <div class="ssk-sticky ssk-left ssk-center ssk-lg ssk-group ssk-count">
        <a href="" class="ssk ssk-facebook"></a>
        <a href="" class="ssk ssk-twitter"></a>
        <a href="" class="ssk ssk-google-plus"></a>
        <a href="https://github.com/acqrdeveloper" target="_blank" class="ssk ssk-github"></a>
        <a href="https://wa.me/51955588297?text=Hola @AlexChristian" target="_blank" class="ssk ssk-whatsapp"></a>
    </div>
</template>

<script>
    import 'social-share-kit'
    import $ from 'jquery'

    export default {
        name: 'SocialShareKitLayout',
        created(){
            // Get data from metas
            this.initialize()
        },
        methods: {
            initialize(){
                $(document).ready(() =>{
                    SocialShareKit.init()
                })
            },
        },
    }
</script>

<style scoped>

</style>