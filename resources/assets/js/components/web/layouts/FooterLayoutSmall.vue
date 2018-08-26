<template>
    <footer class="py-2 bg-light border-left-0 border-right-0 border-bottom-0 border-1">
        <div class="container">
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
        </div>
    </footer>
</template>

<script>
    export default {
        name: 'FooterLayoutSmall',
        data: () => ({
            newDate: new Date(),
        }),
    }
</script>

<style scoped>

</style>