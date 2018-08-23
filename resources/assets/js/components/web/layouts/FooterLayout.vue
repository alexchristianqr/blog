<template>
        <div class="container">
            <template v-if="util.getStorage('data_screen').isComputer || util.getStorage('data_screen').isTablet">
                <div class="row">
                    <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                        <span class="text-secondary">Copyright <i class="fa fa-copyright"></i> {{newDate.getFullYear()}}</span>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 my-auto text-center">
                        <a href="https://web.facebook.com/alexchristianqr" target="_blank">
                            <i class="fa fa-facebook-square fa-2x text-secondary"></i>
                        </a>
                        <a href="https://github.com/acqrdeveloper" target="_blank">
                            <i class="fa fa-github fa-2x text-secondary"></i>
                        </a>
                        <a href="https://plus.google.com/u/0/113216805867137975496" target="_blank">
                            <i class="fa fa-google-plus-square fa-2x text-secondary"></i>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                        <span class="text-secondary">Created by Alex Christian</span>
                    </div>
                </div>
            </template>
            <template v-if="util.getStorage('data_screen').isMobile">
                <div class="row">
                    <div class="col-5 text-center my-auto">
                        <span class="text-secondary"><i class="fa fa-copyright"></i> {{newDate.getFullYear()}}</span>
                    </div>
                    <div class="col-2 text-center my-auto">
                        <a href="https://github.com/acqrdeveloper" target="_blank">
                            <i class="fa fa-github fa-2x text-secondary"></i>
                        </a>
                    </div>
                    <div class="col-5 text-center my-auto">
                        <span class="text-secondary">by Alex Christian</span>
                    </div>
                </div>
            </template>
        </div>
</template>

<script>
    import Util from '../../../utility'

    export default {
        name: 'FooterLayout',
        data: () => ({
            util: Util,
            newDate: new Date(),
        }),
    }
</script>

<style scoped>

</style>