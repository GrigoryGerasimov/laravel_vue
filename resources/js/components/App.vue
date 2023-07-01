<script>
import { computed, defineComponent } from 'vue'

export default defineComponent({
    name: 'App',

    data() {
        return {
            people: []
        }
    },

    provide() {
        return {
            people: computed(() => this.people),
            getPeople: computed(() => this.getPeople)
        }
    },

    methods: {
        async getPeople() {
            const response = await axios.get('/api/people')
            this.people = response.data
        }
    },

    async mounted() {
        await this.getPeople()
    }
})
</script>

<template>
    <ul class='navbar-nav p-5 mb-5 d-flex flex-row justify-content-evenly'>
        <li class='nav-item'>
            <router-link :to="{ name: 'people.index' }" class='nav-link link-dark link-opacity-50-hover text-decoration-none'>
                People List
            </router-link>
        </li>
        <li class='nav-item'>
            <router-link :to="{ name: 'people.store' }" class='nav-link link-dark link-opacity-50-hover text-decoration-none'>
                Create New Person
            </router-link>
        </li>
    </ul>
    <router-view/>
</template>

<style scoped>

</style>
