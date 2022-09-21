export default ({ store, next }) => {
    if (store.state.role !== 'alumni' && store.state.role !== undefined) {
      if(store.state.role !== 'admin') {
        next("/ero-explore")
      } else {
        next("/explore")
      }
      return false
    }
    next()
  }