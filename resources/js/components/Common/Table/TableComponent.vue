<script>
import { defineComponent } from 'vue'
import TableHeader from './TableHeader.vue'
import TableBody from './TableBody.vue'
import TableFooter from './TableFooter.vue'

export default defineComponent({
    name: "TableComponent",

    components: {
        TableHeader,
        TableBody,
        TableFooter
    },

    props: ['onClick']
})
</script>

<template>
    <table class="table text-center">
        <TableHeader/>
        <TableFooter :onClick="onClick"/>
        <TableBody/>
    </table>
</template>

<style scoped>

</style>
