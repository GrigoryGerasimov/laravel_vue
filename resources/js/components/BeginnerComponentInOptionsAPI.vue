<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "BeginnerComponentInOptionsAPI",
    mounted: function() {
        console.log(`I\`m a new ${this._.type.name}`)
    }
})
</script>

<template>
    <h1>I'm a new Vue.js test component in Options API</h1>
</template>

<style scoped>

</style>
