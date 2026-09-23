import axios from 'axios';
import type { AxiosInstance } from 'axios';

let axiosClient: AxiosInstance = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api/${import.meta.env.VITE_API_CURRENT_VERSION}`,
    withCredentials: true,
});

// Attach Sanctum token from localStorage on every request
axiosClient.interceptors.request.use((config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default axiosClient;
