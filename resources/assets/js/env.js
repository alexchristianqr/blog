let hostname = window.localStorage.getItem('hostname')
export default {
  ApiLaravel: () => {
    return hostname
  },
  WebLaravel: () => {
    return hostname
  },
}