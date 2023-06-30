<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "FormControl",

    props: {
        id: {
            type: String,
            required: true
        },
        inputType: {
            type: String,
            default: 'text'
        },
        extraClasses: String,
        placeholder: String,
        modelValue: [String, Number]
    },

    emits: ['update:modelValue']
})
</script>

<template>
    <div class="row input-group px-5 mb-1 d-flex align-items-baseline">
        <div class="col-4">
            <label class="form-label" :for="id">{{ placeholder }}</label>
        </div>
        <div class="col-8">
            <input :type="inputType" class="form-control" :class="extraClasses" :value="modelValue" :id="id" :placeholder="placeholder"
                   @input="$emit('update:modelValue', $event.target.value)"/>
        </div>
    </div>
</template>

<style scoped>

</style>
