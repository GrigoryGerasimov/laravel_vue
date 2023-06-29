<script>
import { defineComponent } from 'vue'
import { FormControl } from '../'

export default defineComponent({
    name: "TableBody",

    data() {
        return {
            editModeActiveForId: null
        }
    },

    props: {
        people: {
            type: Array,
            default: () => []
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
            <font-awesome-icon :icon="['fas', 'trash']" />
        </td>
    </tr>
    <tr scope="row" class="col-12" v-if="editModeActiveForId === person.id">
        <td class="col-2">{{ person.id }}</td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-name`" placeholder="Name" v-model="person.name"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-age`" type="number" placeholder="Age" v-model="person.age"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-gender`" placeholder="Gender" v-model="person.gender"/>
        </td>
        <td class="col-2">
            <FormControl :id="`${person.id}-u-occupation`" placeholder="Occupation" v-model="person.occupation"/>
        </td>
        <td class="col-1">
            <a href="#" role="button" class="text-decoration-none text-dark" @click.prevent="">
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
