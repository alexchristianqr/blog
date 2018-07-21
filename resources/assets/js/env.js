let env = window.localStorage.getItem('enviroment')
export default {
  ApiLaravel: () => {
    if (env == 'local') {
      return 'http://dev-blog.acqrdeveloper'
    } else {
      return 'http://blog.acqrdeveloper'
    }
  },
  WebLaravel: () => {
    if (env == 'local') {
      return 'http://dev-blog.acqrdeveloper'
    } else {
      return 'http://blog.acqrdeveloper'
    }
  },
}
