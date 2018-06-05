<template>
    <div class="container">
        <template v-if="util.getStorage('data_screen').isComputer">
            <div class="row">
                <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                    <span class="text-muted">Copyright &copy; {{new Date().getFullYear()}}</span>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 my-auto text-center">
                    <i class="fa fa-github fa-2x text-muted"></i>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                    <i class="fa fa-facebook-square fa-2x text-muted"></i>
                    <i class="fa fa-twitter-square fa-2x text-muted"></i>
                    <i class="fa fa-youtube-play fa-2x text-muted"></i>
                </div>
            </div>
        </template>
        <template v-if="util.getStorage('data_screen').isTablet">
            <div class="row">
                <div class="col-sm-6 my-auto text-center">
                    <span class="text-muted">Copyright &copy; {{new Date().getFullYear()}}</span>
                </div>
                <div class="col-sm-6 my-auto text-center">
                    <i class="fa fa-github fa-2x text-muted"></i>
                </div>
            </div>
        </template>
        <template v-if="util.getStorage('data_screen').isMobile">
            <div class="row">
                <div class="col-6 text-center my-auto">
                    <span class="text-muted">Copyright &copy; {{new Date().getFullYear()}}</span>
                </div>
                <div class="col-6 text-center my-auto">
                    <i class="fa fa-github fa-2x text-muted"></i>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
  import Util from '../../utility'

  export default {
    name: 'FooterLayout',
    data: () => ({
      util: Util,
    }),
  }
</script>

<style scoped>

</style>