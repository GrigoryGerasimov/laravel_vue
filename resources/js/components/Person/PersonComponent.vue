<script>
import { defineComponent } from 'vue'
import IndexComponent from './IndexComponent.vue'
import StoreComponent from './StoreComponent.vue'

export default defineComponent({
    name: "PersonComponent",

    components: {
        StoreComponent,
        IndexComponent
    }
})
</script>

<template>
    <StoreComponent/>
    <IndexComponent ref="index"/>
</template>

<style scoped>

</style>
