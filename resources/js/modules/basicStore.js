const state = {
    basic: [],
    loading: true,
};

const getters = {
    basicInfo: state => state.basic,
    loadingState: state => state.loading
};

const actions = {
    async fetchBasicInfo({ commit }) {
        const response = await axios.get('/api/basic');
        commit('setBasicInfo', response.data);
    },
    changeLoadingState({ commit }) {
        commit('setLoading', state.loading);
    }
};

const mutations = {
    setBasicInfo: (state, data) => (state.basic = data),
    setLoading: (state, status) => (state.loading = !status),

};

export default {
    state,
    getters,
    actions,
    mutations,
};