<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "FormControl",
    props: ['id', 'placeholder', 'modelValue'],
    emits: ['update:modelValue']
})
</script>

<template>
    <div class="row input-group px-5 mb-1 d-flex align-items-baseline">
        <div class="col-4">
            <label class="form-label" :for="id">{{ placeholder }}</label>
        </div>
        <div class="col-8">
            <input class="form-control" :value="modelValue" :id="id" :placeholder="placeholder" @input="$emit('update:modelValue', $event.target.value)"/>
        </div>
    </div>
</template>

<style scoped>

</style>
