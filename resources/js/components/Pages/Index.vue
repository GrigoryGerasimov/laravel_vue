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

    methods: {
        filterHandler() {
            this.$store.dispatch('getPeopleFilteredByAge')
        }
    },

    computed: {
        peopleData() {
            return this.$store.getters.people
        }
    }
})
</script>

<template>
    <Table v-show='peopleData'>
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
