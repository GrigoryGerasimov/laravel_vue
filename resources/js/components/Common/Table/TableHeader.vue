<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "TableHeader"
})
</script>

<template>
    <thead>
    <tr scope="row">
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Occupation</th>
        <th colspan="2"></th>
    </tr>
    </thead>
</template>

<style scoped>

</style>
