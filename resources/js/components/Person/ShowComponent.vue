<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'ShowComponent',

    props: {
        person: {
            type: Object
        },
        onSwitchEditMode: {
            type: Function
        },
        onDelete: {
            type: Function
        }
    }
})
</script>

<template>
    <tr scope='row' class='col-12'>
        <td class='col-2'>{{ person.id }}</td>
        <td class='col-2'>{{ person.name }}</td>
        <td class='col-2'>{{ person.age }}</td>
        <td class='col-2'>{{ person.gender }}</td>
        <td class='col-2'>{{ person.occupation }}</td>
        <td class='col-1'>
            <a href='#' role='button' class='text-decoration-none text-dark' @click.prevent='onSwitchEditMode(person.id)'>
                <font-awesome-icon :icon="['fas', 'edit']" />
            </a>
        </td>
        <td class='col-1'>
            <a href='#' role='button' class='text-decoration-none text-dark' @click.prevent='onDelete(person.id)'>
                <font-awesome-icon :icon="['fas', 'trash']" />
            </a>
        </td>
    </tr>
</template>

<style scoped>

</style>
