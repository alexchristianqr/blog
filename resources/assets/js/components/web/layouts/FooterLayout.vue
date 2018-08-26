<template>
    <div>

        <template v-if="util.getStorage('data_screen').isComputer">
            <footer-layout-large/>
        </template>
        <template v-if="util.getStorage('data_screen').isTablet">
            <footer-layout-medium/>
        </template>
        <template v-if="util.getStorage('data_screen').isMobile">
            <template v-if="data.isRoutePost">
                <footer-layout-post/>
            </template>
            <template v-else>
                <footer-layout-small/>
            </template>
        </template>
    </div>
</template>

<script>
    import Util               from '../../../utility'
    import FooterLayoutSmall  from './FooterLayoutSmall'
    import FooterLayoutLarge  from './FooterLayoutLarge'
    import FooterLayoutMedium from './FooterLayoutMedium'
    import FooterLayoutPost   from './FooterLayoutPost'

    export default {
        name: 'FooterLayout',
        components: {FooterLayoutPost, FooterLayoutMedium, FooterLayoutLarge, FooterLayoutSmall},
        props: {
            data: {},
        },
        data: () => ({
            util: Util,
        }),
    }
</script>

<style scoped>
    .border-1 {
        border: 1px solid #6c757d;
    }
</style>