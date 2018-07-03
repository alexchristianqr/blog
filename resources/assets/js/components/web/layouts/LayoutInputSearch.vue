<template>
    <div class="input-group">
        <input v-model="vm_search" name="param_search" ref="text_search" type="text" class="form-control" placeholder="Search" required>
        <div v-show="vm_search != ''" class="input-group-append">
            <button class="btn btn-secondary" type="button" @click="clean"><i class="fa fa-remove"></i></button>
        </div>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'LayoutInputSearch',
    props: {
      dataProps: {},
    },
    data: () => ({
      vm_search: '',
    }),
    created () {
      this.vm_search = this.dataProps.param_request
    },
    methods: {
      clean () {
        this.vm_search = ''
        return this.$refs.text_search.focus()
      },
    },
  }
</script>

<style scoped>

</style>