const routes = [
    {
        path: '/people',
        component: () => import('../components/Pages/Index.vue'),
        name: 'people.index'
    },
    {
        path: '/people/create',
        component: () => import('../components/Pages/Create.vue'),
        name: 'people.store'
    },
    {
        path: '/people/:id',
        component: () => import('../components/Pages/Show.vue'),
        name: 'people.show'
    }
]

export {
    routes
}
