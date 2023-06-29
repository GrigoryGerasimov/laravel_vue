<script>
import { defineComponent } from 'vue'
import { FormControl } from '../'

export default defineComponent({
    name: "TableBody",

    data() {
        return {
            name: null,
            age: null,
            gender: null,
            occupation: null,
            editModeActiveForId: null
        }
    },

    props: {
        people: {
            type: Array,
            required: false
        }
    },

    components: {
        FormControl
    },

    methods: {
        switchEditModeHandler(id) {
            this.editModeActiveForId = id
        }
    }
})
</script>

<template>
    <tbody v-for="person in people" :key="person.id">
    <tr scope="row" v-if="editModeActiveForId !== person.id">
        <td>{{ person.id }}</td>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.gender }}</td>
        <td>{{ person.occupation }}</td>
        <td>
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="switchEditModeHandler(person.id)">
                <font-awesome-icon :icon="['fas', 'edit']" />
            </a>
        </td>
        <td>
            <font-awesome-icon :icon="['fas', 'trash']" />
        </td>
    </tr>
    <tr scope="row" v-if="editModeActiveForId === person.id">
        <td>{{ person.id }}</td>
        <td>
            <FormControl :id="`${person.id}-u-name`" :placeholder="'Name'" v-model="name"/>
        </td>
        <td>
            <FormControl :id="`${person.id}-u-age`" :placeholder="'Age'" v-model="age"/>
        </td>
        <td>
            <FormControl :id="`${person.id}-u-gender`" :placeholder="'Gender'" v-model="gender"/>
        </td>
        <td>
            <FormControl :id="`${person.id}-u-occupation`" :placeholder="'Occupation'" v-model="occupation"/>
        </td>
        <td>
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="">
                <font-awesome-icon :icon="['fas', 'check']" />
            </a>
        </td>
        <td>
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="switchEditModeHandler">
                <font-awesome-icon :icon="['fas', 'undo']" />
            </a>
        </td>
    </tr>
    </tbody>
</template>

<style scoped>

</style>
