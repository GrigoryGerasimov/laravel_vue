<script>
import { defineComponent } from 'vue'
import { ButtonLink } from '../Common'

export default defineComponent({
    name: 'ShowComponent',

    components: {
        ButtonLink
    },

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
            <ButtonLink @click.prevent='onSwitchEditMode'>
                <font-awesome-icon :icon="['fas', 'edit']" />
            </ButtonLink>
        </td>
        <td class='col-1'>
            <ButtonLink @click.prevent='onDelete(person.id)'>
                <font-awesome-icon :icon="['fas', 'trash']" />
            </ButtonLink>
        </td>
    </tr>
</template>

<style scoped>

</style>
