<script>
import { defineComponent } from 'vue'
import { FormControl } from '../'

export default defineComponent({
    name: 'TableBody',

    components: {
        FormControl
    }
})
</script>

<template>
    <tbody>
    <slot></slot>
    </tbody>
</template>

<style scoped>

</style>
