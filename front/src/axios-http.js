import axios from "axios";
let axiosAPI=axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  headers: {
    "Content-type": "application/json"
  }
});
export default axiosAPI;