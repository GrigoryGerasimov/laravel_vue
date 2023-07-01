<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'Table'
})
</script>

<template>
    <table class='table text-center'>
        <slot></slot>
    </table>
</template>

<style scoped>

</style>
