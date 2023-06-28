<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "TableBody",
    props: ['people']
})
</script>

<template>
    <tbody>
    <tr scope="row" v-for="person in people" :key="person.id">
        <td>{{ person.id }}</td>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.gender }}</td>
        <td>{{ person.occupation }}</td>
    </tr>
    </tbody>
</template>

<style scoped>

</style>
