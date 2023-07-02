<script>
import { defineComponent } from 'vue'
import { Table, TableBody, TableFooter, TableHeader } from '../Common'
import ShowComponent from '../Person/ShowComponent.vue'
import UpdateComponent from '../Person/UpdateComponent.vue'

export default defineComponent({
    name: 'Show',

    components: {
        TableFooter,
        TableBody,
        TableHeader,
        Table,
        ShowComponent,
        UpdateComponent,
    },

    computed: {
        person() {
            return this.$store.getters.person
        },

        editModeActive() {
            return this.$store.getters.editModeActive
        }
    },

    methods: {
        switchEditModeHandler() {
            this.$store.dispatch('switchEditModeHandler')
        },

        submitHandler(id, data) {
            this.$store.dispatch('submitHandler', { id, data })
        },

        resetHandler() {
            this.$store.dispatch('resetHandler')
        },

        deleteHandler(id) {
            this.$store.dispatch('deleteHandler', id)
        }
    },

    beforeCreate() {
        this.$store.dispatch('getPerson', this.$route.params.id)
    }
})
</script>

<template>
    <Table v-show="person">
        <TableHeader>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Occupation</th>
            <th colspan="2"></th>
        </TableHeader>
        <TableBody>
            <ShowComponent
                v-show='!editModeActive'
                v-if='person'
                :person='person'
                :onSwitchEditMode='switchEditModeHandler'
                :onDelete='deleteHandler'
            />
            <UpdateComponent
                v-show='editModeActive'
                v-if='person'
                :person='person'
                :onReset='resetHandler'
                :onSubmit='submitHandler'
            />
        </TableBody>
    </Table>
</template>

<style scoped>

</style>
