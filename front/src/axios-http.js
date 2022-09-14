import axios from "axios";
let axiosAPI=axios.create({
  baseURL: 'http://127.0.0.1:8000/api/',
  headers: {
    "Content-type": "application/json"
  }
});
export default axiosAPI;