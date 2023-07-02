import router from "../../../router/router.js";

export default {
    state: {
        people: null,
        person: null,
        editModeActive: false
    },

    getters: {
        people: state => state.people,
        person: state => state.person,
        editModeActive: state => state.editModeActive
    },

    actions: {
        async getPeople({ state, commit, dispatch }) {
            const response = await axios.get('/api/people')
            commit('setPeople', response.data)
        },

        getPeopleFilteredByAge({ state, commit, dispatch }) {
            commit('setPeopleFilteredByAge', { age: 30 })
        },

        async getPerson({ state, commit, dispatch }, id) {
            await dispatch('getPeople')
            commit('setPerson', { id })
        },

        switchEditModeHandler({ state, commit, dispatch }) {
            commit('setEditMode')
        },

        async storeHandler({ state, commit, dispatch }, data) {
            await axios.post('/api/people', data)
            await router.push({ name: 'people.index' })
            await dispatch('getPeople')
        },

        async submitHandler({ state, commit, dispatch }, { id, data }) {
            const response = await axios.patch(`/api/people/${id}`, data)
            const updatedPeopleList = state.people.map(personData => {
                if (personData.id === id) Object.assign(personData, response.data)
                return personData
            })
            commit('setPeople', updatedPeopleList)
            dispatch('switchEditModeHandler')
        },

        resetHandler() {
            router.go()
        },

        async deleteHandler({ state, commit, dispatch }, id) {
            const isDeleted = await axios.delete(`/api/people/${id}`)
            if (isDeleted) {
                const updatedPeopleList = state.people.filter(person => person.id !== id)
                commit('setPeople', updatedPeopleList)
                await router.push({ name: 'people.index' })
                dispatch('getPeople')
            }
        }
    },

    mutations: {
        setPeople: (state, payload) => {
            state.people = payload
        },

        setPeopleFilteredByAge: (state, payload) => {
            state.people = state.people && state.people.filter(person => person.age > payload.age);
        },

        setPerson: (state, payload) => {
            state.person = state.people && state.people.find(person => String(person.id) === payload.id)
        },

        setEditMode: (state, payload) => {
            state.editModeActive = !state.editModeActive
        }
    }
}
