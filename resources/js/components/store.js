import Vue from 'vue';
import Vuex from 'vuex';

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
        setSelectedSize(state, size) {
            state.selectedSize = size;
        },
        setSelectedConnection(state, connection) {
            state.selectedConnection = connection;
        },
        setFetchData(state, data){
            state.products.push(data);
        },
        setGetProducts(state, data) {
            state.productsTable.push(data);
        }, 
        setFilterDropdowns(state, data) {
            state.grades.push(data);
        }, 
        setFilterGrade(state, data) {
            state.sizes.push(data);
        }, 
        setFilterSize(state, data) {
            state.connections.push(data);
        }, 
        // Definisikan mutasi lainnya di sini jika diperlukan
    },
    actions: {
        // Definisikan tindakan jika diperlukan
    },
    getters: {
        // Definisikan getter jika diperlukan
    }
});
