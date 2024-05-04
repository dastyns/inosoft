<template>
  <v-app>
    <v-container>
      <v-row class="m-0">
        <v-col cols="12" md="6" align="left">
          <h2>List of Products</h2>
        </v-col>
        <v-col cols="12" md="6" align="right">
          <v-text-field v-model="search" single-line placeholder="Search" class="search-input"></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          <v-data-table :headers="headers" :items="data" :loading="loading" :search="search"
            :no-data-text="'No data available'" :items-per-page="-1" class="elevation-1 custom-table">
          </v-data-table>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
export default {
  props: {
    data: {
      type: Array,
      required: true
    },
    loading: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      search:"",
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Code', value: 'code' },
        { text: 'Item ID', value: 'item_id' },
        { text: 'Quantity', value: 'qty' },
        { text: 'Quantity Unit', value: 'qty_unit' },
        { text: 'Country Name', value: 'country_name' },
        { text: 'Item Code', value: 'item_code' },
        { text: 'Item Desc', value: 'item_desc' },
        { text: 'Product Type', value: 'product_type' },
        { text: 'Grade', value: 'grade' },
        { text: 'Connection', value: 'connection' },
        { text: 'Size', value: 'size' },
      ]
    }
  }
}
</script>

<style>
.end {
  display: flex;
  justify-content: flex-end;
}
  .v-application--wrap {
    min-height: 0vh !important;
  }
  .search-input {
  width: 100%;
  max-width: 400px;
  margin-bottom: 0px;
}


.custom-table {
  border: 1px solid #ddd;
  border-radius: 5px;
  overflow: hidden;
}

.custom-table .v-data-table-header {
  background-color: #f5f5f5;
}

.custom-table .v-data-table-header th {
  color: #333;
}

.custom-table .v-data-table-header th .column-text {
  font-weight: bold;
}

.custom-table .v-data-table-row {
  transition: background-color 0.3s ease;
}

.custom-table .v-data-table-row:hover {
  background-color: #f0f0f0;
}

</style>