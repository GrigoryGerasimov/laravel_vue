<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'FormControl',

    props: {
        id: {
            type: String,
            required: true
        },
        inputType: {
            type: String,
            default: 'text'
        },
        extraClasses: {
            type: String,
            default: 'border-0 border-bottom bg-transparent p-0 m-0 text-center'
        },
        placeholder: String,
        modelValue: [String, Number]
    },

    emits: ['update:modelValue']
})
</script>

<template>
    <input :type='inputType' class='form-control' :class='extraClasses' :value='modelValue' :id='id'
           :placeholder='placeholder'
           @input="$emit('update:modelValue', $event.target.value)"/>
</template>

<style scoped>

</style>
