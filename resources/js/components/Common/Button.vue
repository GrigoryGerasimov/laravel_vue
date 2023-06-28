<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "Button",
    props: ['className', 'title', 'onClick']
})
</script>

<template>
    <button @click.prevent="onClick" class="btn" :class="className">{{ title }}</button>
</template>

<style scoped>

</style>
