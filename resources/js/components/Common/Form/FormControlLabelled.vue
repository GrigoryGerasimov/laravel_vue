<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "FormControl",

    props: {
        id: {
            type: String,
            required: true
        },
        className: {
            type: String,
            required: false
        },
        placeholder: {
            type: String,
            required: false
        },
        modelValue: {
            type: String,
            required: false
        }
    },

    emits: ['update:modelValue']
})
</script>

<template>
    <div class="row input-group px-5 mb-1 d-flex align-items-baseline">
        <div class="col-4">
            <label class="form-label" :class="className" :for="id">{{ placeholder }}</label>
        </div>
        <div class="col-8">
            <input class="form-control" :class="className" :value="modelValue" :id="id" :placeholder="placeholder"
                   @input="$emit('update:modelValue', $event.target.value)"/>
        </div>
    </div>
</template>

<style scoped>

</style>
