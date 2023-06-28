<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "Button",
    props: ['className']
})
</script>

<template>
    <button class="btn" :class="className">Submit</button>
</template>

<style scoped>

</style>
