import { createStore } from 'vuex';

const store = createStore({

    state() {
        return  {
            testStr : '테스트 str',
            laravelData: null,
        }
    },

    mutations: {
        setLaravelData(state, data) {
            state.laravelData = data;
        },
    },

    actions: {


    }

});

export default store;