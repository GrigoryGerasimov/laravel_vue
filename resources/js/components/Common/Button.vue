<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'Button',
    props: {
        extraClasses: {
            type: String,
            default: 'btn-outline-dark'
        },
        title: String,
        onClick: Function
    }
})
</script>

<template>
    <button @click.prevent='onClick' class='btn w-25 mt-3 mx-5 align-self-end' :class='extraClasses'>{{ title }}</button>
</template>

<style scoped>

</style>
