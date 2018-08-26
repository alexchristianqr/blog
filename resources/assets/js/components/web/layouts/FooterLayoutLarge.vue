<template>
    <footer class="py-4 bg-light border-left-0 border-right-0 border-bottom-0 border-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                    <span class="text-secondary"><i class="fa fa-copyright"></i> {{newDate.getFullYear()}} All right reserved</span>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 my-auto text-center">
                    <a href="https://web.facebook.com/alexchristianqr" target="_blank">
                        <i class="fa fa-facebook-square fa-2x text-secondary m-1"></i>
                    </a>
                    <a href="https://github.com/acqrdeveloper" target="_blank">
                        <i class="fa fa-github fa-2x text-secondary m-1"></i>
                    </a>
                    <a href="https://plus.google.com/u/0/113216805867137975496" target="_blank">
                        <i class="fa fa-google-plus-square fa-2x text-secondary m-1"></i>
                    </a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-4 my-auto text-center">
                    <span class="text-secondary">by Alex Christian</span>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: 'FooterLayout',
        data: () => ({
            newDate: new Date(),
        }),
    }
</script>

<style scoped>

</style>