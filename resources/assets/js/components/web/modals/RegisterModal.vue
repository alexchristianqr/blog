<template>
    <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog modal-sm" role="document">
            <form @submit.prevent="doRegister">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Register</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close">
                            <span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button title="Start with Facebook" type="submit" class="btn btn-outline-facebook btn-lg"><i class="fa fa-facebook-square fa-2x"></i></button>
                                <button title="Start with Google" type="submit" class="btn btn-outline-danger btn-lg"><i class="fa fa-google-plus-square fa-2x"></i></button>
                                <button title="Start with Github" type="submit" class="btn btn-outline-dark btn-lg"><i class="fa fa-github-square fa-2x"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <input v-model="params.name" type="text" class="form-control" placeholder="Name" required>
                            <span v-if="errors.name != undefined" class="help-block text-muted"><strong>{{errors.name[0]}}</strong></span>
                        </div>
                        <div class="form-group">
                            <input v-model="params.email" type="email" class="form-control" placeholder="Email" required>
                            <span v-if="errors.email != undefined" class="help-block text-muted"><strong>{{errors.email[0]}}</strong></span>
                        </div>
                        <div class="form-group">
                            <input v-model="params.password" type="password" class="form-control" placeholder="Password" required>
                            <span v-if="errors.password != undefined" class="help-block text-muted"><strong>{{errors.password[0]}}</strong></span>
                        </div>
                        <div class="form-group-sm">
                            <input v-model="params.password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <template v-if="loading">
                            <button type="submit" class="btn btn-dark btn-block" :disabled="true">Creating...</button>
                        </template>
                        <template v-else>
                            <button type="submit" class="btn btn-dark btn-block">Create</button>
                        </template>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
  import UserService from '../../../services/UserService'

  export default {
    name: 'RegisterModal',
    props: {
      dataToken: '',
    },
    data: () => ({
      params: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        token: '',
      },
      errors: {},
      loading: false,
    }),
    methods: {
      doRegister () {
        this.params.token = this.dataToken
        UserService.dispatch('doRegister', {self: this})
      },
      close () {
        this.errors = {}
        this.params.name = ''
        this.params.email = ''
        this.params.password = ''
        this.params.password_confirmation = ''
      },
    },
  }
</script>

<style scoped>

</style>