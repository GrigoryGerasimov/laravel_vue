<script>
import { defineComponent } from 'vue'
import StoreComponent from '../Person/StoreComponent.vue'

export default defineComponent({
    name: 'Create',

    components: {
        StoreComponent
    }
})
</script>

<template>
    <StoreComponent/>
</template>

<style scoped>

</style>
