<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'ButtonLink'
})
</script>

<template>
    <a href='#' role='button' class='text-decoration-none text-dark'>
        <slot></slot>
    </a>
</template>

<style scoped>

</style>
