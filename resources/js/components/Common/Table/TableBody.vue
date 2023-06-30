<script>
import { defineComponent } from 'vue'
import { FormControl } from '../'

export default defineComponent({
    name: 'TableBody',

    inject: ['people'],

    data() {
        return {
            peopleData: this.people,
            editModeActiveForId: null
        }
    },

    watch: {
        people: {
            handler(newValue) {
                this.peopleData = newValue
            }
        }
    },

    components: {
        FormControl
    },

    methods: {
        switchEditModeHandler(id = null) {
            this.editModeActiveForId = id
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
            }
        }
    }
})
</script>

<template>
    <tbody v-for='person in peopleData' :key='person.id'>
    <slot
        name='show'
        v-bind='{person, onSwitchEditMode: switchEditModeHandler, onDelete: deleteHandler}'
        v-if='editModeActiveForId !== person.id'
    ></slot>
    <slot
        name='update'
        v-bind='{person, onSwitchEditMode: switchEditModeHandler, onSubmit: submitHandler}'
        v-if='editModeActiveForId === person.id'
    ></slot>
    </tbody>
</template>

<style scoped>

</style>
