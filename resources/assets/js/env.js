let hostname = window.localStorage.getItem('hostname')
export default {
  ApiLaravel: () => {
    return hostname + '/api'
  },
  WebLaravel: () => {
    return hostname
  },
}