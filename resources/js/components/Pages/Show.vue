<script>
import { defineComponent } from 'vue'
import { Table, TableBody, TableFooter, TableHeader } from '../Common'
import ShowComponent from '../Person/ShowComponent.vue'
import UpdateComponent from '../Person/UpdateComponent.vue'
import router from '../../router/router.js'

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

    data() {
        return {
            peopleData: this.people,
            editModeActive: false
        }
    },

    inject: ['people', 'getPeople'],

    watch: {
        people: {
            handler(newValue) {
                this.peopleData = newValue
            }
        }
    },

    methods: {
        switchEditModeHandler() {
            this.editModeActive = !this.editModeActive
        },

        async submitHandler(id, data) {
            const response = await axios.patch(`/api/people/${id}`, data)
            this.peopleData = this.peopleData.map(personData => {
                if (personData.id === id) Object.assign(personData, response.data)
                return personData
            })

            this.switchEditModeHandler()
        },

        async deleteHandler(id) {
            const isDeleted = await axios.delete(`/api/people/${id}`)
            if (isDeleted) {
                this.peopleData = this.peopleData.filter(person => person.id !== id)
                await router.push({ name: 'people.index' })
                await this.getPeople()
            }
        }
    },

    computed: {
        person() {
            return this.peopleData.find(person => String(person.id) === this.$route.params.id)
        }
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
                :onSwitchEditMode='switchEditModeHandler'
                :onSubmit='submitHandler'
            />
        </TableBody>
    </Table>
</template>

<style scoped>

</style>
