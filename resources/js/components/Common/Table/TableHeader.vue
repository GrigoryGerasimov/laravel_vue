<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "TableHeader"
})
</script>

<template>
    <thead>
    <tr scope="row">
        <slot></slot>
    </tr>
    </thead>
</template>

<style scoped>

</style>
