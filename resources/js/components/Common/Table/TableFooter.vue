<script>
import { defineComponent } from 'vue'
import Button from '../Button.vue'

export default defineComponent({
    name: "TableFooter",

    components: {
        Button
    },

    props: ['onClick']
})
</script>

<template>
    <tfoot>
    <tr>
        <td colspan="4">
            <Button :className="'btn-outline-primary w-25 mt-3 mx-5 align-self-end'" :title="'Filter per Age (over 30)'" :onClick="onClick"/>
        </td>
    </tr>
    </tfoot>
</template>

<style scoped>

</style>
