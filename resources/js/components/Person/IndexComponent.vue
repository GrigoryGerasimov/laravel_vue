<script>
import {defineComponent} from 'vue'
import {ButtonLink} from '../Common'

export default defineComponent({
    name: 'OverviewComponent',

    components: {
        ButtonLink
    },

    props: {
        person: {
            type: Object
        }
    }
})
</script>

<template>
    <tr scope='row' class='col-12'>
        <td class='col-4'>{{ person.id }}</td>
        <td class='col-4'>{{ person.name }}</td>
        <td class='col-4'>
            <router-link :to="{ name: 'people.show', params: { id: person.id } }">
                <ButtonLink>
                    <font-awesome-icon :icon="['fas', 'info']"/>
                </ButtonLink>
            </router-link>
        </td>
    </tr>
</template>

<style scoped>

</style>
