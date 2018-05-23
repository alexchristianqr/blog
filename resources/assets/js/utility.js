/**
 * Autor   :   Alex Christian
 * Email  :   aquispe.developer@gmail.com
 * Github :   https://github.com/acqrdeveloper
 */

export default {
  /** Método sample*/
  load () {
    console.log('file utility.js loaded')
  },
  /**
   * Método para convertir segundos a horas con minutos
   * @param param_seconds = segundos
   */
  returnSecondsToFormatHHMMSS (param_seconds) {
    let sec_num = parseInt(param_seconds, 10),
      hh = Math.floor(sec_num / 3600),
      mm = Math.floor((sec_num - (hh * 3600)) / 60),
      ss = sec_num - (hh * 3600) - (mm * 60)
    if (hh < 10) hh = '0' + hh
    if (mm < 10) mm = '0' + mm
    if (ss < 10) ss = '0' + ss
    return hh + ':' + mm + ':' + ss
  },
  /**
   * Método para autogenerar un arreglo de letras del abecedario
   * @param param_charStart = caracter de inicio 'a'
   * @param param_charEnd = caracter de fin 'z'
   */
  generateCharArray (param_charStart, param_charEnd) {
    let alfabet = [],
      i = param_charStart.charCodeAt(0),
      j = param_charEnd.charCodeAt(0)
    for (; i <= j; ++i) {
      alfabet.push(String.fromCharCode(i))
    }
    return alfabet
  },
  /**
   * Método para devolver una letra
   * @param param_key = posición de arreglo
   * @param param_toUpper = condicional para mayuscula o minuscula
   */
  returnLetter (param_key, param_toUpper = false) {
    const letters = this.generateCharArray('a', 'z')
    if (param_toUpper) {
      return (letters[param_key]).toString().toUpperCase()
    } else {
      return letters[param_key]
    }
  },
  /**
   * Método para devolver un error genérico
   * @param param_error = error rest apis
   */
  returnError (param_error) {
    switch (param_error.response.status) {
      case 500:
        return console.error(param_error) // Error de servidor
      case 401:
        return console.error(param_error) // Error de autenticacion
      case 412:
        return console.error(param_error) // Error de condiciones en la solicitud
    }
  },
  /**
   * Método para crear una cookie
   * @param param_name = nombre cookie
   * @param param_value = rutas de vue-router
   * @param param_daysExpired = cantidad de días de expiración
   */
  setCookie (param_name, param_value, param_daysExpired = 1) {
    let d = new Date()
    d.setTime(d.getTime() + (param_daysExpired * 24 * 60 * 60 * 1000))
    let expires = 'expires=' + d.toUTCString()
    return document.cookie = param_name + '=' + JSON.stringify(param_value) +
      ';' + expires + ';path=/'
  },
  /**
   * Método para obtener datos de una cookie
   * @param param_name = nombre cookie
   */
  getCookie (param_name) {
    let name = param_name + '='
    let decodedCookie = decodeURIComponent(document.cookie)
    let ca = decodedCookie.split(';')
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i]
      while (c.charAt(0) == ' ') {c = c.substring(1)}
      if (c.indexOf(name) == 0) {
        return JSON.parse(c.substring(name.length, c.length))
      }
    }
    return ''
  },
  /**
   * Método para remover una cookie
   * @param param_name = nombre cookie
   * @param param_path = rutas de vue-router
   */
  removeCookie (param_name, param_path) {
    return document.cookie = param_name +
      '=;expires=Thu, 01 Jan 1970 00:00:01 GMT; path=' + param_path
  },
  /**
   * Método para crear en el storage
   * @param param_name = nombre cookie
   * @param param_value = data
   */
  setStorage (param_name, param_value) {
    return window.localStorage.setItem(param_name, JSON.stringify(param_value))
  },
  /**
   * Método para obtener datos del storage
   * @param param_name = nombre cookie
   */
  getStorage (param_name) {
    return JSON.parse(window.localStorage.getItem(param_name))
  },
  /**
   * Método para eliminar del storage
   * @param param_name = nombre cookie
   */
  removeStorage (param_name) {
    return window.localStorage.removeItem(param_name)
  },
  /**
   * Método para buscar y obtener una imagen, en el repositorio de imagenes
   * @param param_image = nombre imagen
   */
  getImagePath (param_image) {
    // try{
    //   return require('@/assets/img/' + param_image)
    // }catch (e) {
    //   console.log(e)
    // }
  },
  /**
   * Método para generar un texto alfanumerico
   * @param param_length = tamaño
   */
  generateHash (param_length = 16) {
    const dec2hex = (dec) => {
      return ('0' + dec.toString(16)).substr(-2)
    }
    let arr = new Uint8Array((param_length || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
  },
  /**
   * Método para cargar y mostrar imagen
   * @param self = instancia de vue
   */
  handleFileUpload (self) {
    let preview = self.$refs.html5_img, file = self.$refs.html5_file.files[0],
      reader = new FileReader()
    reader.onloadend = () => {
      preview.src = reader.result
    }
    if (file) {
      return reader.readAsDataURL(file)
    } else {
      return preview.src = ''
    }
  },
}