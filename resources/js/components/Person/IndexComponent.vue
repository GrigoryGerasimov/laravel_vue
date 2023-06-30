<script>
import { defineComponent, computed } from 'vue'
import { Table, TableHeader, TableBody, TableFooter } from '../Common'
import ShowComponent from './ShowComponent.vue'
import UpdateComponent from './UpdateComponent.vue'

export default defineComponent({
    name: 'IndexComponent',

    components: {
        Table,
        TableFooter,
        TableBody,
        TableHeader,
        ShowComponent,
        UpdateComponent
    },

    data() {
        return {
            people: []
        }
    },

    provide() {
        return {
            people: computed(() => this.people)
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
    <Table v-show='people.length'>
        <TableHeader/>
        <TableFooter :onClick='filterHandler'/>
        <TableBody>
            <template #show='{ person, onSwitchEditMode, onDelete }'>
                <ShowComponent :person='person' :onSwitchEditMode='onSwitchEditMode' :onDelete='onDelete'/>
            </template>
            <template #update='{ person, onSwitchEditMode, onSubmit }'>
                <UpdateComponent :person='person' :onSwitchEditMode='onSwitchEditMode' :onSubmit='onSubmit'/>
            </template>
        </TableBody>
    </Table>
</template>

<style scoped>

</style>
