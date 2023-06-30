<script>
import { defineComponent } from 'vue'
import { FormControl } from '../'

export default defineComponent({
    name: "TableBody",

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

        async submitHandler(id) {
            const updatedPerson = this.people.find(person => person.id === id)

            const response = await axios.patch(`/api/people/${id}`, updatedPerson)
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
    <tbody v-for="person in peopleData" :key="person.id">
    <tr scope="row" class="col-12" v-if="editModeActiveForId !== person.id">
        <td class="col-2">{{ person.id }}</td>
        <td class="col-2">{{ person.name }}</td>
        <td class="col-2">{{ person.age }}</td>
        <td class="col-2">{{ person.gender }}</td>
        <td class="col-2">{{ person.occupation }}</td>
        <td class="col-1">
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="switchEditModeHandler(person.id)">
                <font-awesome-icon :icon="['fas', 'edit']" />
            </a>
        </td>
        <td class="col-1">
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="deleteHandler(person.id)">
                <font-awesome-icon :icon="['fas', 'trash']" />
            </a>
        </td>
    </tr>
    <tr scope="row" class="col-12" v-if="editModeActiveForId === person.id">
        <td class="col-2">{{ person.id }}</td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-name`" placeholder="Name" v-model.trim="person.name"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-age`" type="number" placeholder="Age" v-model.trim="person.age"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-gender`" placeholder="Gender" v-model.trim="person.gender"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-occupation`" placeholder="Occupation" v-model.trim="person.occupation"/>
        </td>
        <td class="col-1">
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="submitHandler(person.id)">
                <font-awesome-icon :icon="['fas', 'check']" />
            </a>
        </td>
        <td class="col-1">
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="switchEditModeHandler">
                <font-awesome-icon :icon="['fas', 'undo']" />
            </a>
        </td>
    </tr>
    </tbody>
</template>

<style scoped>

</style>
