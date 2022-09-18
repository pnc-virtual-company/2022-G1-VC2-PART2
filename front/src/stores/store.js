import { createStore } from 'vuex';
import getCookie from '../helper/getCookie'
import axios from '../axios-http'
import decryptData from '../helper/dencryptData';


export const store = new createStore({
  state: {
    role: decryptData(getCookie('role'), 'my_role'),
    token: decryptData(getCookie('alumni'), 'my_token'),
    userId: null,
    userEmail: null,
  },
  actions: {
    logout(){
      document.cookie = `${'alumni'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      document.cookie = `${'role'}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      axios.get('/logout')
    }
  }
})
