<template>
    <div class="container">
        <template v-if="util.getStorage('data_screen').isComputer">
            <div class="row">
                <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                    <span>1</span>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 my-auto text-center">
                    <span class="text-muted">Copyright &copy; @acqrdeveloper {{new Date().getFullYear()}}</span>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                    <span>2</span>
                </div>
            </div>
        </template>
        <template v-if="util.getStorage('data_screen').isTablet">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 my-auto text-center">
                    <span class="text-muted">Copyright &copy; @acqrdeveloper {{new Date().getFullYear()}}</span>
                </div>
            </div>
        </template>
        <template v-if="util.getStorage('data_screen').isMobile">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <span class="text-muted">Copyright &copy; @acqrdeveloper {{new Date().getFullYear()}}</span>
                </div>
                <div class="col-sm-6 text-center">
                    <span><i class="fa fa-github fa-2x"></i></span>
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
    created() {
      console.log('aqui footer layout')
    },
  }
</script>

<style scoped>

</style>