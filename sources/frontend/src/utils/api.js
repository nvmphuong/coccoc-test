import axios from 'axios';
// create an axios instance
const service = axios.create({
    // withCredentials: true, // send cookies when cross-domain requests
    baseURL: process.env.VUE_APP_API_URL || 'http://'+window.location.host+':8888/api', // url = base url + request url
    timeout: 5000 // request timeout
});

// request interceptor
service.interceptors.request.use(
    config => {
        // do something before request is sent
        return config;
    },
    error => {
        // do something with request error
        return Promise.reject(error);
    },
);

// response interceptor
service.interceptors.response.use(
    /**
     * If you want to get http information such as headers or status
     * Please return  response => response
     */
    response => {
        const res = response.data;
        // if the custom code is not 20000, it is judged as an error.
        if (response.status !== 200) {
            return Promise.reject(new Error('Error'));
        } else {
            // if the custom code is not 1, it is judged as custom api error message.
            if (res.status !== 1) {
                return Promise.reject(new Error(res.message || 'Error'));
            }
            let {data} = res;
            return data;
        }
    },
    error => {
        return Promise.reject(error);
    },
);
export default service;
