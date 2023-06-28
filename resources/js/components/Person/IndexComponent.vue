<script>
import { defineComponent } from 'vue'
import { TableComponent } from '../Common'

export default defineComponent({
    name: "IndexComponent",

    components: {
        TableComponent
    },

    data() {
        return {
            people: []
        }
    },

    methods: {
        async getPeople() {
            const response = await axios.get('/api/people')
            this.people = response.data
        },

        filterHandler() {
            return this.getPeopleFilteredByAge;
        }
    },

    async mounted() {
        await this.getPeople()
    },

    computed: {
        getPeopleFilteredByAge() {
            return this.people = this.people.filter(person => person.age > 30);
        }
    }

})
</script>

<template>
    <TableComponent :people="people" :onClick="filterHandler"/>
</template>

<style scoped>

</style>
