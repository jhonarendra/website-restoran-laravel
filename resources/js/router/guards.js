
const guard = {
  auth (to, from, next) {
    if (localStorage.token) {
      next()
    } else {
      next({ name: 'login' })
    }
  },
  noAuth (to, from, next) {
    if (!localStorage.token) {
      next()
    } else {
      next({ name: 'user' })
    }
  }
}

export default guard