// import axios from "axios";
// let axiosAPI=axios.create({
//   baseURL: 'http://127.0.0.1:8000/api/',
//   headers: {
//     "Content-type": "application/json",
//     // 'Authorization': 'Bearer ' +  JSON.parse(localStorage.getItem('token'))
//     'Authorization': 'Bearer ' +  "25|x5ZTJPWaEkNQPFaexWotr2To3JilnOeCUkPy9Xc4"
//   }
// });
// export default axiosAPI;

import axios from "axios";
import getCookie from "./helper/getCookie";
import decryptData from "./helper/dencryptData";

export default axios.create({
  baseURL: "http://localhost:8000/api",
  headers: {
    "Content-type": "application/json",
    'Authorization': 'Bearer ' +  decryptData(getCookie('alumni'), 'my_token')
  }
});