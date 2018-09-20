<div id="app-container-search" class="input-group">
    <input v-model="vm_search" name="param_search" ref="text_search" type="text" class="form-control"
           placeholder="Search in all" required>
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
@section('script-js')
    <script type="text/javascript">
        new Vue({
            el:'#app-container-search',
            data: () => ({
                dataProps: {},
                dataColorSec: {color:'btn-secondary'},
                dataColorFirst: {color:'btn-primary'},
                vm_search: '',
            }),
            created(){
                this.vm_search = '{{request("param_search")}}'
            },
            methods: {
                clean(){
                    this.vm_search = ''
                    return this.$refs.text_search.focus()
                },
            },
        })
    </script>
@endsection