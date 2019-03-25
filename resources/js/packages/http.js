import Vue from 'vue'
import Axios from 'axios'

Axios.defaults.baseURL = process.env.MIX_APP_URL
Axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

Axios.interceptors.response.use(
    (response) => {
        if (response.data.error !== undefined) {
            Vue.toasted.error(response.data.error)
            return response
        }

        if (response.data._META) {
            response.data._META.messages.forEach((message) => {
                if (message.type === 'ok') Vue.toasted.success(message.content)
                if (message.type === 'normal') Vue.toasted.show(message.content)
                if (message.type === 'error') Vue.toasted.error(message.content)
            })
        }

        return response
    },
    (error) => {
    },
)

Vue.prototype.$http = Axios
