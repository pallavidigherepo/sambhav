import axios from 'axios';
// import stores from './stores';
//import router from './router/index.ts';


let axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api/${import.meta.env.VITE_API_CURRENT_VERSION}`,
    // withCredentials: true,
});


export default axiosClient;
