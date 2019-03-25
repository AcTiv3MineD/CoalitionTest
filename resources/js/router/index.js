import Vue from 'vue'
import Router from 'vue-router'

import Full from '@/containers/Full'
import {CreateProduct, ListProducts} from '@/views/products'

Vue.use(Router)

const router = new Router({
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
        {
            path: '/',
            name: 'container',
            component: Full,
            children: [
                {
                    path: '/',
                    name: 'list_products',
                    component: ListProducts,
                },
                {
                    path: '/create_product',
                    name: 'create_product',
                    component: CreateProduct,
                },
            ],
        },
    ],
})

export default router
