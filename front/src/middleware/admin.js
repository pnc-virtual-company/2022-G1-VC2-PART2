export default ({ store, next }) => {
    if (store.state.role !== 'admin' && store.state.role !== undefined) {
      if (store.state.role !== 'ero') {
        next("/")
      }else {
        next("/ero")
      }
      return false
    }
    next()
  }