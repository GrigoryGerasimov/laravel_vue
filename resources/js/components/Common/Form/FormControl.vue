<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "FormControl",
    props: ['id', 'placeholder']
})
</script>

<template>
    <div class="row input-group px-5 mb-1 d-flex align-items-baseline">
        <div class="col-2">
            <label class="form-label" :for="id">{{ placeholder }}</label>
        </div>
        <div class="col-7">
            <input class="form-control" :id="id" :placeholder="placeholder"/>
        </div>
    </div>
</template>

<style scoped>

</style>
