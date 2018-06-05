<template>
    <nav :class="util.getStorage('data_screen').isSmall ? 'navbar navbar-expand-lg navbar-dark bg-dark relative-top' : 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top'" style="background-color: #24292e !important;color:rgba(255,255,255,0.75) !important;">
        <div class="container">
            <a class="navbar-brand" href="/"><strong class="mr-1">Alex Christian</strong><span class="text-muted small">@acqrdeveloper</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="outline: none !important;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive"></div>
        </div>
    </nav>
</template>

<script>
  import Util from '../../utility'
  export default {
    name: 'NavLayout',
    data: () => ({
      util: Util,
    }),
  }
</script>

<style scoped>

</style>