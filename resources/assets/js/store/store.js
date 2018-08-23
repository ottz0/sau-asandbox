import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        counter: 0,
        userName:"Default Name is  'Testing'"
    },
    getters:{
        changeUsername: state =>{
            return state.userName;
        },
        doubleCounter: state =>{
            return state.counter * 2;
        }
    },
    mutations:{
        increment(state){
            state.counter++;
        },
        updateUsername(state, payload){
            console.log(payload);
            state.userName = payload;
            //state.userName;
        }
    }
});