<script>
import { defineComponent } from 'vue'
import { FormControlLabelled, Button } from '../Common'
import router from '../../router/router.js'

export default defineComponent({
    name: 'StoreComponent',

    components: {
        FormControlLabelled,
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

    inject: ['getPeople'],

    methods: {
        async storeHandler() {
            await axios.post('/api/people', this.dataFromInput)
            await router.push({ name: 'people.index' })
            await this.getPeople()
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
            <FormControlLabelled id="c-name" placeholder="Name" v-model.trim="name"/>
            <FormControlLabelled id="c-age" type="number" placeholder="Age" v-model.trim="age"/>
            <FormControlLabelled id="c-gender" placeholder="Gender" v-model.trim="gender"/>
            <FormControlLabelled id="c-occupation" placeholder="Occupation" v-model.trim="occupation"/>
            <Button extra-classes="btn-outline-success" title="Submit" :onClick="storeHandler"/>
        </div>
    </div>
</template>

<style scoped>

</style>
