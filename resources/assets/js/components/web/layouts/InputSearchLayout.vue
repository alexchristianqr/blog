<template>
    <div class="input-group">
        <input v-model="vm_search" name="param_search" ref="text_search" type="text" class="form-control" placeholder="Search" required>
        <div v-show="vm_search != ''" class="input-group-append">
            <template v-if="dataColorSec != undefined">
                <button :class="'btn '+dataColorSec.color" type="button" @click="clean"><i class="fa fa-remove"></i></button>
            </template>
            <template v-else>
                <button class="btn btn-secondary" type="button" @click="clean"><i class="fa fa-remove"></i></button>
            </template>
        </div>
        <div class="input-group-append">
            <template v-if="dataColorFirst != undefined">
                <button :class="'btn '+dataColorFirst.color" type="submit"><i class="fa fa-search"></i></button>
            </template>
            <template v-else>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'InputSearchLayout',
        props: {
            dataProps: {},
            dataColorSec: {color:'btn-secondary'},
            dataColorFirst: {color:'btn-primary'},
        },
        data: () => ({
            vm_search: '',
        }),
        created(){
            this.vm_search = this.dataProps.param_request
        },
        methods: {
            clean(){
                this.vm_search = ''
                return this.$refs.text_search.focus()
            },
        },
    }
</script>

<style scoped>

</style>