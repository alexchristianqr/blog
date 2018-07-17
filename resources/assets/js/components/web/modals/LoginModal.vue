<template>
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog modal-sm" role="document">
            <form @submit.prevent="doLogin">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close">
                            <span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button title="Start with Facebook" type="submit"
                                        class="btn btn-outline-facebook btn-lg"><i
                                        class="fa fa-facebook-square fa-2x"></i></button>
                                <button title="Start with Google" type="submit" class="btn btn-outline-danger btn-lg"><i
                                        class="fa fa-google-plus-square fa-2x"></i></button>
                                <button title="Start with Github" type="submit" class="btn btn-outline-dark btn-lg"><i
                                        class="fa fa-github-square fa-2x"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group has-error">
                            <input v-model="params.email" ref="inputEmail" class="form-control" type="text" placeholder="Email" title="Registrar" required>
                            <span v-if="errors.email != undefined" class="help-block text-muted"><strong>{{errors.email[0]}}</strong></span>
                        </div>
                        <div class="form-group">
                            <input v-model="params.password" ref="inputPassword" class="form-control" type="password" placeholder="Password" required>
                            <span v-if="errors.password != undefined" class="help-block text-muted"><strong>{{errors.password[0]}}</strong></span>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label text-muted"><input name="rememberme" class="form-check-input" type="checkbox">Remember Password</label>
                            </div>
                        </div>
                        <div class="form-group-sm">
                            <div class="text-left text-nowrap">
                                <a class="small text-muted" href="http://blog.acqrdeveloper.com/password/reset">Forgot Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <template v-if="loading">
                            <button type="button" class="btn btn-dark btn-block" disabled>Loading...</button>
                        </template>
                        <template v-else>
                            <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                        </template>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
  import AuthService from '../../../services/AuthService'

  export default {
    name: 'LoginModal',
    props:{
      dataToken:''
    },
    data: () => ({
      params: {
        email: '',
        password: '',
        token: '',
      },
      errors: {},
      loading: false
    }),
    methods: {
      doLogin () {
        this.params.token = this.dataToken
        AuthService.dispatch('doLogin', {self: this})
      },
      close () {
        this.errors = {}
        this.params.email = ''
        this.params.password = ''
      },
    },
  }
</script>

<style scoped>

</style>