import Vue   from 'vue'
import Vuex  from 'vuex'
import Axios from 'axios'
import Env   from './../env'

Vue.use(Vuex)

export default new Vuex.Store({
  actions: {
    doLogin ({commit}, {self}) {
      self.loading = true
      Axios.post(Env.ApiLaravel() + '/login', self.params).then((r) => {
        if (r.status === 200) {
          window.location.reload(true)
        }
      }).catch((e) => {
        self.loading = false
        self.errors = e.response.data.errors
        self.params.password = ''
        self.$refs.inputPassword.focus()
      })
    },
  },
})