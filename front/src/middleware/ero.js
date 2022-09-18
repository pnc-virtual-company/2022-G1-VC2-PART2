export default ({ store, next }) => {
    if (store.state.role !== 'ero' && store.state.role !== undefined) {
      if (store.state.role !== 'admin') {
        next("/")
      }else {
        next("/explore")
      }
      return false
    }
    next()
  }