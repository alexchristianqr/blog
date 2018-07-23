import Vue   from 'vue'
import Vuex  from 'vuex'
import Axios from 'axios'
import Env   from './../env'

Vue.use(Vuex)

// Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
export default new Vuex.Store({
  actions: {
    doRegister ({commit}, {self}) {
      self.loading = true
      Axios.post(Env.ApiLaravel() + '/register', self.params).then((r) => {
        if (r.status === 200) {
          window.location.reload(true)
        }
      }).catch((e) => {
        self.loading = false
        self.errors = e.response.data.errors
      })
    },
  },
})