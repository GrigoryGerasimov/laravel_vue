<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "IndexComponent",

    data() {
        return {
            people: []
        }
    },

    methods: {
        async getPeople() {
            const response = await axios.get('api/people')
            this.people = response.data
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
    <table class="table table-striped table-hover text-center">
        <thead>
        <tr scope="row">
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Occupation</th>
        </tr>
        </thead>
        <tbody>
        <tr scope="row" v-for="person in getPeopleFilteredByAge" :key="person.id">
            <td>{{ person.id }}</td>
            <td>{{ person.name }}</td>
            <td>{{ person.age }}</td>
            <td>{{ person.gender }}</td>
            <td>{{ person.occupation }}</td>
        </tr>
        </tbody>
    </table>
</template>

<style scoped>

</style>
