<script>
import { defineComponent } from 'vue'
import { FormControl } from '../'

export default defineComponent({
    name: "TableBody",

    props: {
        people: {
            type: Array,
            default: () => []
        }
    },

    data() {
        return {
            name: null,
            age: null,
            gender: null,
            occupation: null,
            editModeActiveForId: null,
            peopleData: this.people
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
        setPersonInitDataById(id) {
            const person = this.peopleData.find(person => person.id === id)
            Object.assign(this, person)
            this.switchEditModeHandler(id)
        },

        switchEditModeHandler(id) {
            this.editModeActiveForId = id
        },

        async submitHandler(id) {
            const response = await axios.patch(`/api/people/${id}`, this.updatedData)
            this.peopleData = this.peopleData.map(personData => {
                if (personData.id === id) {
                    personData.name = response.data.name
                    personData.age = response.data.age
                    personData.gender = response.data.gender
                    personData.occupation = response.data.occupation
                }
                return personData
            })
            this.switchEditModeHandler(null)
        }
    },

    computed: {
        updatedData() {
            return {
                name: this.name,
                age: this.age,
                gender: this.gender,
                occupation: this.occupation
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
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="setPersonInitDataById(person.id)">
                <font-awesome-icon :icon="['fas', 'edit']" />
            </a>
        </td>
        <td class="col-1">
            <font-awesome-icon :icon="['fas', 'trash']" />
        </td>
    </tr>
    <tr scope="row" class="col-12" v-if="editModeActiveForId === person.id">
        <td class="col-2">{{ person.id }}</td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-name`" placeholder="Name" v-model.trim="name"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-age`" type="number" placeholder="Age" v-model.trim="age"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-gender`" placeholder="Gender" v-model.trim="gender"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-occupation`" placeholder="Occupation" v-model.trim="occupation"/>
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
