import PersonComponent from '../components/Person/PersonComponent.vue'
import TestComponent from '../components/TestComponent.vue'

const routes = [
    {
        path: '/people',
        component: PersonComponent
    },
    {
        path: '/test',
        component: TestComponent
    }
]

export {
    routes
}
