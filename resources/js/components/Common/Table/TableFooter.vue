<script>
import { defineComponent } from 'vue'
import Button from '../Button.vue'

export default defineComponent({
    name: 'TableFooter',

    components: {
        Button
    },

    props: ['onClick']
})
</script>

<template>
    <tfoot>
    <tr>
        <td colspan='4'>
            <Button extra-classes='btn-outline-primary' title='Filter per Age (over 30)' :onClick='onClick'/>
        </td>
    </tr>
    </tfoot>
</template>

<style scoped>

</style>
