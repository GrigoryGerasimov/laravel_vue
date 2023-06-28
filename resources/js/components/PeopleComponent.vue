<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "PeopleComponent",

    data() {
        return {
            people: []
        }
    },

    methods: {
        async getPeople() {
            const response = await axios.get('api/people')
            this.people = response.data
        },

        getPeopleFilteredByAge() {
            return this.people = this.people.filter(person => person.age > 30);
        }
    },

    async mounted() {
        await this.getPeople()
        this.getPeopleFilteredByAge()
    },

})
</script>

<template>
    <table class="table table-striped table-hover text-center">
        <thead>
        <tr scope="row">
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Occupation</th>
        </tr>
        </thead>
        <tbody>
        <tr scope="row" v-for="person in people">
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
