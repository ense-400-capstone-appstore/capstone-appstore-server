import tippy from "tippy.js";
import axios from "axios";
import { initRecaptcha } from "./grecaptcha";

export default () => {
    window.tippy = tippy;

    window.axios = axios;
    window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

    // Register the CSRF token as a common header with Axios
    let token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
        window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
    } else {
        console.error(
            "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
        );
    }

    window.initRecaptcha = initRecaptcha;

    /**
     * Echo exposes an expressive API for subscribing to channels and listening
     * for events that are broadcast by Laravel. Echo and event broadcasting
     * allows your team to easily build robust real-time web applications.
     */

    // import Echo from 'laravel-echo'

    // window.Pusher = require('pusher-js');

    // window.Echo = new Echo({
    //     broadcaster: 'pusher',
    //     key: process.env.MIX_PUSHER_APP_KEY,
    //     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    //     encrypted: true
    // });
};
