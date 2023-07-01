<script>
import { defineComponent } from 'vue'
import { Table, TableBody, TableFooter, TableHeader } from '../Common'
import IndexComponent from '../Person/IndexComponent.vue'
import UpdateComponent from '../Person/UpdateComponent.vue'

export default defineComponent({
    name: 'Index',

    components: {
        Table,
        TableFooter,
        TableBody,
        TableHeader,
        IndexComponent,
        UpdateComponent
    },

    data() {
        return {
            peopleData: this.people
        }
    },

    inject: ['people'],

    watch: {
        people: {
            handler(newValue) {
                this.peopleData = newValue
            }
        }
    },

    methods: {
        filterHandler() {
            return this.getPeopleFilteredByAge;
        }
    },

    computed: {
        getPeopleFilteredByAge() {
            return this.peopleData = this.peopleData.filter(person => person.age > 30);
        }
    }
})
</script>

<template>
    <Table v-show='peopleData.length'>
        <TableHeader>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
        </TableHeader>
        <TableFooter :onClick='filterHandler'/>
        <TableBody v-for='person in peopleData' :key='person.id'>
            <IndexComponent :person='person'/>
        </TableBody>
    </Table>
</template>

<style scoped>

</style>
