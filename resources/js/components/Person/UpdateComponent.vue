<script>
import { defineComponent } from 'vue'
import { FormControl } from '../Common'

export default defineComponent({
    name: 'UpdateComponent',

    props: {
        person: {
            type: Object
        },
        onReset: {
            type: Function
        },
        onSubmit: {
            type: Function
        }
    },

    components: {
        FormControl
    }
})
</script>

<template>
    <tr scope='row' class='col-12'>
        <td class='col-2'>{{ person.id }}</td>
        <td class='col-2'>
            <FormControl :id='`${person.id}-u-name`' placeholder='Name' v-model.trim.lazy='person.name'/>
        </td>
        <td class='col-2'>
            <FormControl :id='`${person.id}-u-age`' type='number' placeholder='Age' v-model.trim.lazy='person.age'/>
        </td>
        <td class='col-2'>
            <FormControl :id='`${person.id}-u-gender`' placeholder='Gender' v-model.trim.lazy='person.gender'/>
        </td>
        <td class='col-2'>
            <FormControl :id='`${person.id}-u-occupation`' placeholder='Occupation' v-model.trim.lazy='person.occupation'/>
        </td>
        <td class='col-1'>
            <a href='#' role='button' class='text-decoration-none text-dark' @click.prevent='onSubmit(person.id, person)'>
                <font-awesome-icon :icon="['fas', 'check']" />
            </a>
        </td>
        <td class='col-1'>
            <a href='#' role='button' class='text-decoration-none text-dark' @click.prevent='onReset'>
                <font-awesome-icon :icon="['fas', 'undo']" />
            </a>
        </td>
    </tr>
</template>

<style scoped>

</style>
