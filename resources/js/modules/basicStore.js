const state = {
    basic: [],
};

const getters = {
    basicInfo: state => state.basic,
};

const actions = {
    async fetchBasicInfo({ commit }) {
        const response = await axios.get('/api/basic');
        commit('setBasicInfo', response.data);
    },
};

const mutations = {
    setBasicInfo: (state, data) => (state.basic = data),
};

export default {
    state,
    getters,
    actions,
    mutations,
};
