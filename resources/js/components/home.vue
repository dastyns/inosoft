<template>
    <div>
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href=""
                        class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">
                            PIPESALES
                        </h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">info@example.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+012 345 6789</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                                <a class="" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">
                                PIPESALES
                            </h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="" class="nav-item nav-link active">Home</a>
                                <a href="" class="nav-item nav-link">About</a>
                                <a href="" class="nav-item nav-link">Services</a>
                                <a href="" class="nav-item nav-link">Rooms</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Booking</a>
                                        <a href="" class="dropdown-item">Our Team</a>
                                        <a href="" class="dropdown-item">Testimonial</a>
                                    </div>
                                </div>
                                <a href="" class="nav-item nav-link">Contact</a>
                            </div>
                            <a href="" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Premium
                                Version<i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-fluid"
                            src="https://test.pipesales.dev/view2/image/webp/header-background-2.webp" alt="Image" />
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                                    Good Pipe
                                </h6>
                                <h2 class="display-3 text-white mb-4 animated slideInDown">
                                    Your Global Marketplace
                                </h2>
                                <h2 class="display-3 text-white mb-4 animated slideInDown">
                                    Buy & Sell Tubular Products
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid booking wow fadeIn" data-wow-delay="0.1s" id="app">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label>Product Type</label>
                                    <select class="form-select" @change="handleProductTypeChange($event.target.value)">
                                        <option value="ALL">ALL</option>
                                        <template v-for="(
                                                count, productType
                                            ) in products.product_type_counts">
                                            <option :key="productType" :value="productType">
                                                {{ productType }} ({{ count }})
                                            </option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Grade</label>
                                    <select class="form-select" :disabled="isGradeSelectDisabled"
                                        @change="handleGradeChange($event.target.value)">
                                        <option value="ALL">ALL</option>
                                        <option v-for="(count, grade) in grades" :key="grade" :value="grade">
                                            {{ grade }} ({{ count }})
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Size</label>
                                    <select class="form-select" :disabled="isSizeSelectDisabled"
                                        @change="handleSizeChange($event.target.value)">
                                        <option value="ALL">ALL</option>
                                        <template>
                                            <option v-for="(count, size) in sizes" :key="size" :value="size">
                                                {{ size }} ({{ count }})
                                            </option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Connection</label>
                                    <select class="form-select" @change="handleConnectionChange($event.target.value)"
                                        :disabled="isConnectionSelectDisabled">
                                        <option value="ALL">ALL</option>
                                        <template>
                                            <option v-for="(
                                                    count, connection
                                                ) in connections" :key="connection" :value="connection">
                                                {{ connection }} ({{ count }})
                                            </option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100 h-100" @click="getProducts">
                                Find
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <template>
                            <div>
                                <div v-if="loading" class="loading-container">
                                    <div class="loading-spinner"></div>
                                </div>
                                <div v-else>
                                    <DataTable :data="productsTable" :loading="loading"
                                        v-if="productsTable.length > 0" />
                                    <div v-else>No data available</div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DataTable from "./DataTable.vue";
import Vuetify from "vuetify";
import { mapState, mapMutations, mapActions, mapGetters } from 'vuex';

export default {
    components: {
        DataTable,
    },
    Vuetify,
    
    // data() {
    //     return {
    //         products: [],
    //         productsTable: [],
    //         productsGroup: [],
    //         grades: [],
    //         sizes: [],
    //         connections: [],
    //         selectedProductType: "ALL",
    //         selectedGrade: "ALL",
    //         selectedSize: "ALL",
    //         selectedConnection: "ALL",
    //         loading: false,
    //         productTypeSearch: "",
    //     };
    // },
    mounted() {
        this.fetchData();
    },
    computed: {
        isGradeSelectDisabled() {
            return this.selectedProductType === "ALL";
        },
        isSizeSelectDisabled() {
            return (
                this.selectedProductType === "ALL" ||
                this.selectedGrade === "ALL"
            );
        },
        isConnectionSelectDisabled() {
            return (
                this.selectedProductType === "ALL" ||
                this.selectedGrade === "ALL" ||
                this.selectedSize === "ALL"
            );
        },
        ...mapState([
            'products',
            'productsGroup',
            'selectedProductType',
            'selectedGrade',
            'selectedSize',
            'selectedConnection',
            'loading',
            'grades',
            'sizes',
            'connections',
            'productsTable',
        ]),
    },
    methods: {
        // async fetchData() {
        //     try {
        //         const response = await axios.get("http://127.0.0.1:8000/api/products/group");
        //         this.products = response.data;
        //         console.log(this.products);
        //     } catch (error) {
        //         console.error("Error fetching data:", error);
        //     }
        // },
        // async getProducts() {
        //     try {
        //         this.loading = true;
        //         const response = await axios.get(`http://127.0.0.1:8000/api/products`, {
        //             params: {
        //                 type: this.selectedProductType,
        //                 grade: this.selectedGrade,
        //                 size: this.selectedSize,
        //                 connection: this.selectedConnection
        //             }
        //         });
        //         const data = response.data;
        //         if (data && data.length > 0) {
        //             this.productsTable = data;
        //         } else {
        //             this.productsTable = [];
        //         }
        //         this.loading = false;
        //     } catch (error) {
        //         console.error("Error fetching products data:", error);
        //         this.loading = false;
        //     }
        // },
        // async filterDropdowns() {
        //     this.loading = true;
        //     this.selectedGrade = "ALL";
        //     this.selectedSize = "ALL";
        //     this.selectedConnection = "ALL";
        //     this.sizes = [];
        //     this.connections = [];
        //     try {
        //         const response = await axios.get(`http://127.0.0.1:8000/api/products/grade/quantity`, {
        //             params: {
        //                 type: this.selectedProductType
        //             }
        //         });
        //         const data = response.data;

        //         this.grades = data;
        //         console.log(this.grades);

        //         this.loading = false;
        //     } catch (error) {
        //         console.error("Error fetching products data:", error);
        //         this.loading = false;
        //     }
        // },
        // async filterGrade() {
        //     try {
        //         this.loading = true;
        //         const response = await axios.get(`http://127.0.0.1:8000/api/products/size/quantity`, {
        //             params: {
        //                 type: this.selectedProductType,
        //                 grade: this.selectedGrade
        //             }
        //         });
        //         const data = response.data;

        //         this.sizes = data;
        //         console.log(this.sizes);
        //         this.selectedSize = "ALL";

        //         this.loading = false;
        //     } catch (error) {
        //         console.error("Error fetching products data:", error);
        //         this.loading = false;
        //     }
        // },
        // async filterSize() {
        //     try {
        //         this.loading = true;
        //         const response = await axios.get(`http://127.0.0.1:8000/api/products/connection/quantity`, {
        //             params: {
        //                 type: this.selectedProductType,
        //                 grade: this.selectedGrade,
        //                 size: this.selectedSize
        //             }
        //         });
        //         const data = response.data;

        //         this.connections = data;
        //         console.log(this.connections);
        //         this.selectedConnection = "ALL";                                                                                                                                                                                                                                                                            

        //         this.loading = false;
        //     } catch (error) {
        //         console.error("Error fetching products data:", error);
        //         this.loading = false;
        //     }
        // },
        handleProductTypeChange(productType) {
            this.setSelectedProductType(productType);
            this.filterDropdowns();
        },
        handleGradeChange(grade) {
            this.setSelectedGrade(grade);
            this.filterGrade();
        },
        handleSizeChange(size) {
            this.setSelectedSize(size);
            this.filterSize();
        },
        handleConnectionChange(connection) {
            this.setSelectedConnection(connection);
        },
        ...mapActions([
            'fetchData',
            'getProducts',
            'filterDropdowns',
            'filterGrade',
            'filterSize',
        ]),
        ...mapMutations([
            'setSelectedProductType',
            'setSelectedGrade',
            'setSelectedSize',
            'setSelectedConnection',
            'setFetchData',
            'setGetProducts',
            'setFilterDropdowns',
            'setFilterGrade',
            'setFilterSize',
            'setLoading',
        ]),
    },
};
</script>

<style>
.loading-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.loading-spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
</style>
