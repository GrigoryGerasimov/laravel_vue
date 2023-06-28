<script>
import {defineComponent} from 'vue'
import {FormControl, Button} from '../Common'

export default defineComponent({
    name: 'StoreComponent',

    components: {
        FormControl,
        Button
    }
})
</script>

<template>
    <div class="row mb-5">
        <div class="col-6">
            <FormControl :id="'name'" :placeholder="'Name'"/>
            <FormControl :id="'age'" :placeholder="'Age'"/>
            <FormControl :id="'gender'" :placeholder="'Gender'"/>
            <FormControl :id="'occupation'" :placeholder="'Occupation'"/>
            <Button :class="'btn-outline-success w-25 mt-3 mx-5 px-5 align-self-end'"/>
        </div>
    </div>
</template>

<style scoped>

</style>
