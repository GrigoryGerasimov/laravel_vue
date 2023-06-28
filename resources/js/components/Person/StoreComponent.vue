<script>
import { defineComponent } from 'vue'
import { FormControl, Button } from '../Common'

export default defineComponent({
    name: 'StoreComponent',

    components: {
        FormControl,
        Button
    },

    data() {
        return {
            name: null,
            age: null,
            gender: null,
            occupation: null
        }
    },

    methods: {
        async storeHandler() {
            const response = await axios.post('/api/people', this.dataFromInput)
            console.log(response.data);
        }
    },

    computed: {
        dataFromInput() {
            return {
                name: this.name,
                age: this.age,
                gender: this.gender,
                occupation: this.occupation
            }
        }
    }
})
</script>

<template>
    <div class="row mb-5">
        <div class="col-12">
            <FormControl :id="'name'" :placeholder="'Name'" v-model.trim="name"/>
            <FormControl :id="'age'" :placeholder="'Age'" v-model.trim="age"/>
            <FormControl :id="'gender'" :placeholder="'Gender'" v-model.trim="gender"/>
            <FormControl :id="'occupation'" :placeholder="'Occupation'" v-model.trim="occupation"/>
            <Button :className="'btn-outline-success w-25 mt-3 mx-5 align-self-end'" :title="'Submit'" :onClick="storeHandler"/>
        </div>
    </div>
</template>

<style scoped>

</style>
