<template>
    <div>
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a
                        href=""
                        class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center"
                    >
                        <h1 class="m-0 text-primary text-uppercase">
                            PIPESALES
                        </h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div
                                class="h-100 d-inline-flex align-items-center py-2 me-4"
                            >
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">info@example.com</p>
                            </div>
                            <div
                                class="h-100 d-inline-flex align-items-center py-2"
                            >
                                <i
                                    class="fa fa-phone-alt text-primary me-2"
                                ></i>
                                <p class="mb-0">+012 345 6789</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href=""
                                    ><i class="fab fa-facebook-f"></i
                                ></a>
                                <a class="me-3" href=""
                                    ><i class="fab fa-twitter"></i
                                ></a>
                                <a class="me-3" href=""
                                    ><i class="fab fa-linkedin-in"></i
                                ></a>
                                <a class="me-3" href=""
                                    ><i class="fab fa-instagram"></i
                                ></a>
                                <a class="" href=""
                                    ><i class="fab fa-youtube"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                    <nav
                        class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0"
                    >
                        <a href="" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">
                                PIPESALES
                            </h1>
                        </a>
                        <button
                            type="button"
                            class="navbar-toggler"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse justify-content-between"
                            id="navbarCollapse"
                        >
                            <div class="navbar-nav mr-auto py-0">
                                <a href="" class="nav-item nav-link active"
                                    >Home</a
                                >
                                <a href="" class="nav-item nav-link">About</a>
                                <a href="" class="nav-item nav-link"
                                    >Services</a
                                >
                                <a href="" class="nav-item nav-link">Rooms</a>
                                <div class="nav-item dropdown">
                                    <a
                                        href="#"
                                        class="nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        >Pages</a
                                    >
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a
                                            href=""
                                            class="dropdown-item"
                                            >Booking</a
                                        >
                                        <a
                                            href=""
                                            class="dropdown-item"
                                            >Our Team</a
                                        >
                                        <a
                                            href=""
                                            class="dropdown-item"
                                            >Testimonial</a
                                        >
                                    </div>
                                </div>
                                <a href="" class="nav-item nav-link"
                                    >Contact</a
                                >
                            </div>
                            <a
                                href=""
                                class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block"
                                >Premium Version<i
                                    class="fa fa-arrow-right ms-3"
                                ></i
                            ></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0 mb-5">
            <div
                id="header-carousel"
                class="carousel slide"
                data-bs-ride="carousel"
            >
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            class="w-100"
                            src="img/carousel-1.jpg"
                            alt="Image"
                        />
                        <div
                            class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                        >
                            <div class="p-3" style="max-width: 700px">
                                <h6
                                    class="section-title text-white text-uppercase mb-3 animated slideInDown"
                                >
                                    Good Pipe
                                </h6>
                                <h1
                                    class="display-3 text-white mb-4 animated slideInDown"
                                >
                                    Your Global Marketplace
                                </h1>
                                <h1
                                    class="display-3 text-white mb-4 animated slideInDown"
                                >
                                    Buy & Sell Tubular Products
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="container-fluid booking wow fadeIn"
            data-wow-delay="0.1s"
            id="app"
        >
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label>Product Type</label>
                                    <select
                                        class="form-select"
                                        v-model="selectedProductType"
                                        @change="filterDropdowns"
                                    >
                                        <option value="ALL">ALL</option>
                                        <template
                                            v-for="(
                                                count, productType
                                            ) in products.product_type_counts"
                                        >
                                            <option
                                                :key="productType"
                                                :value="productType"
                                            >
                                                {{ productType }} ({{ count }})
                                            </option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Grade</label>
                                    <select
                                        class="form-select"
                                        v-model="selectedGrade"
                                        :disabled="isGradeSelectDisabled"
                                        @change="filterGrade"
                                    >
                                        <option value="ALL">ALL</option>
                                        <option
                                            v-for="(count, grade) in grades"
                                            :key="grade"
                                            :value="grade"
                                        >
                                            {{ grade }} ({{ count }})
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Size</label>
                                    <select
                                        class="form-select"
                                        v-model="selectedSize"
                                        :disabled="isSizeSelectDisabled"
                                        @change="filterSize"
                                    >
                                        <option value="ALL">ALL</option>
                                        <template>
                                            <option
                                                v-for="(count, size) in sizes"
                                                :key="size"
                                                :value="size"
                                            >
                                                {{ size }} ({{ count }})
                                            </option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Connection</label>
                                    <select
                                        class="form-select"
                                        v-model="selectedConnection"
                                        :disabled="isConnectionSelectDisabled"
                                    >
                                        <option value="ALL">ALL</option>
                                        <template>
                                            <option
                                                v-for="(
                                                    count, connection
                                                ) in connections"
                                                :key="connection"
                                                :value="connection"
                                            >
                                                {{ connection }} ({{ count }})
                                            </option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button
                                class="btn btn-primary w-100 h-100"
                                @click="getProducts"
                            >
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
                                <div v-if="loading">Loading...</div>
                                <div v-else>
                                    <DataTable
                                        :data="productsTable"
                                        :loading="loading"
                                        v-if="productsTable.length > 0"
                                    />
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

export default {
    components: {
        DataTable,
    },
    Vuetify,
    data() {
        return {
            products: [],
            productsTable: [],
            productsGroup: [],
            grades: [],
            sizes: [],
            connections: [],
            selectedProductType: "ALL",
            selectedGrade: "ALL",
            selectedSize: "ALL",
            selectedConnection: "ALL",
            loading: false,
            productTypeSearch: "",
        };
    },
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
    },
    methods: {
        async fetchData() {
            try {
                const response = await fetch(
                    "http://127.0.0.1:8000/api/products/group"
                );
                const data = await response.json();
                this.products = data;
                console.log(this.products);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        },
        async getProducts() {
            try {
                this.loading = true;
                const selectedCon = encodeURIComponent(this.selectedConnection);
                const selectedType = encodeURIComponent(
                    this.selectedProductType
                );
                const selectedGrad = encodeURIComponent(this.selectedGrade);
                const selectedSiz = encodeURIComponent(this.selectedSize);
                const response = await fetch(
                    `http://127.0.0.1:8000/api/products?type=${selectedType}&grade=${selectedGrad}&size=${selectedSiz}&connection=${selectedCon}`
                );
                const data = await response.json();
                if (data && data.length > 0) {
                    this.productsTable = data;
                } else {
                    this.productsTable = [];
                }

                this.loading = false;
            } catch (error) {
                console.error("Error fetching products data:", error);
                this.loading = false;
            }
        },
        async getProductsList(productType) {
            try {
                this.loading = true;
                const response = await fetch(
                    `http://127.0.0.1:8000/api/products/list?type=${productType}`
                );
                const data = await response.json();
                if (data && data.length > 0) {
                    this.productsTable = data;
                } else {
                    this.productsTable = [];
                }

                this.loading = false;
            } catch (error) {
                console.error("Error fetching products data:", error);
                this.loading = false;
            }
        },
        async filterDropdowns() {
            this.loading = true;
            this.selectedGrade = "ALL";
            this.selectedSize = "ALL";
            this.selectedConnection = "ALL";
            this.sizes = [];
            this.connections = [];
            try {
                const selectedType = encodeURIComponent(
                    this.selectedProductType
                );
                const response = await fetch(
                    `http://127.0.0.1:8000/api/products/grade/quantity?type=${selectedType}`
                );
                const data = await response.json();

                this.grades = data;
                console.log(this.grades);

                this.loading = false;
            } catch (error) {
                console.error("Error fetching products data:", error);
                this.loading = false;
            }
        },
        async filterGrade() {
            try {
                this.loading = true;
                const selectedType = encodeURIComponent(
                    this.selectedProductType
                );
                const selectedGrad = encodeURIComponent(this.selectedGrade);
                const response = await fetch(
                    `http://127.0.0.1:8000/api/products/size/quantity?type=${selectedType}&grade=${selectedGrad}`
                );
                const data = await response.json();

                this.sizes = data;
                console.log(this.sizes);
                this.selectedSize = "ALL";

                this.loading = false;
            } catch (error) {
                console.error("Error fetching products data:", error);
                this.loading = false;
            }
        },
        async filterSize() {
            try {
                this.loading = true;
                const selectedType = encodeURIComponent(
                    this.selectedProductType
                );
                const selectedGrad = encodeURIComponent(this.selectedGrade);
                const selectedSiz = encodeURIComponent(this.selectedSize);
                const response = await fetch(
                    `http://127.0.0.1:8000/api/products/connection/quantity?type=${selectedType}&grade=${selectedGrad}&size=${selectedSiz}`
                );
                const data = await response.json();

                this.connections = data;
                console.log(this.sizes);
                this.selectedConnection = "ALL";

                this.loading = false;
            } catch (error) {
                console.error("Error fetching products data:", error);
                this.loading = false;
            }
        },
    },
};
</script>
