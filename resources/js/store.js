import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        products: [],
        productsTable: [],
        productsGroup: [],
        grades: [],
        sizes: [],
        connections: [],
        selectedProductType: 'ALL',
        selectedGrade: 'ALL',
        selectedSize: 'ALL',
        selectedConnection: 'ALL',
        loading: false,
    },
    mutations: {
        setSelectedProductType(state, productType) {
            state.selectedProductType = productType;
        },
        setSelectedGrade(state, grade) {
            state.selectedGrade = grade;
        },
        setSelectedSize(state, size) {
            state.selectedSize = size;
        },
        setSelectedConnection(state, connection) {
            state.selectedConnection = connection;
        },
        setFetchData(state, data){
            state.products = data;
        },
        setGetProducts(state, data) {
            state.productsTable=data;
        }, 
        setFilterDropdowns(state, data) {
            state.grades=data;
        }, 
        setFilterGrade(state, data) {
            state.sizes=data;
        }, 
        setFilterSize(state, data) {
            state.connections=data;
        }, 
        setLoading(state, data){
            state.loading = data;
        }
        // Definisikan mutasi lainnya di sini jika diperlukan
    },
    actions: {
        async fetchData({ commit, state }) {
            // Check if data is already available in the store
            if (state.products.length > 0) {
                console.log(state.products);
                return; // Exit the function early if data is already present
            }
            console.log(state.products);
            const response = await axios.get('http://127.0.0.1:8000/api/products/group');
            const products = response.data;
            commit('setFetchData', products);
        },
        async getProducts({ commit, state }) {
            commit('setLoading', true);
            const response = await axios.get('http://127.0.0.1:8000/api/products', {
                params: {
                    type: state.selectedProductType,
                    grade: state.selectedGrade,
                    size: state.selectedSize,
                    connection: state.selectedConnection,
                },
            });
            const data = response.data;
            commit('setGetProducts', data);
            commit('setLoading', false);
        },
        async filterDropdowns({ commit, state }) {
            const selectedProductType = state.selectedProductType; // This should be the selected product type from the API response or any other source
            commit('setSelectedProductType', selectedProductType);
            commit('setSelectedGrade', 'ALL');
            commit('setSelectedSize', 'ALL');
            commit('setSelectedConnection', 'ALL');
            commit('setFilterGrade', []);
            commit('setFilterSize', []);
            const response = await axios.get(`http://127.0.0.1:8000/api/products/grade/quantity`, {
                params: {
                    type: state.selectedProductType,
                },
            });
            const data = response.data;
            commit('setFilterDropdowns', data);
        },
        async filterGrade({ commit, state }) {
            const response = await axios.get(`http://127.0.0.1:8000/api/products/size/quantity`, {
                params: {
                    type: state.selectedProductType,
                    grade: state.selectedGrade,
                },
            });
            const data = response.data;
            commit('setFilterGrade', data);
            commit('setSelectedSize', 'ALL');
        },
        async filterSize({ commit, state }) {
            const response = await axios.get(`http://127.0.0.1:8000/api/products/connection/quantity`, {
                params: {
                    type: state.selectedProductType,
                    grade: state.selectedGrade,
                    size: state.selectedSize,
                },
            });
            const data = response.data;
            commit('setFilterSize', data);
            commit('setSelectedConnection', 'ALL');
        },
    },
    getters: {
        // Definisikan getter jika diperlukan
    }
});
