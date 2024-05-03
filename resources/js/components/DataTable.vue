<template>
<v-app>
  <v-container>
    <v-row class="end">
      <v-col cols="12" md="6" class="end">
        <v-text-field v-model="search" single-line placeholder="Search" class="search-input"></v-text-field>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-data-table
          :headers="headers"
          :items="data"
          :loading="loading"
          :search="search"
          :no-data-text="'No data available'"
          class="elevation-1 custom-table">
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
        { text: 'Item Code', value: 'Item code' },
        { text: 'Item Desc', value: 'Item desc' },
        { text: 'Product Type', value: 'product_type' },
        { text: 'Grade', value: 'grade' },
        { text: 'Connection', value: 'connection' },
        { text: 'Size', value: 'size' },
        // Add more header fields as needed
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
  margin-bottom: 0px; /* Adjust spacing */
}

/* Custom styles for data table */
.custom-table {
  border: 1px solid #ddd; /* Add border */
  border-radius: 5px; /* Add border-radius */
  overflow: hidden; /* Hide overflow */
}

.custom-table .v-data-table-header {
  background-color: #f5f5f5; /* Change header background color */
}

.custom-table .v-data-table-header th {
  color: #333; /* Change header text color */
}

.custom-table .v-data-table-header th .column-text {
  font-weight: bold; /* Make header text bold */
}

.custom-table .v-data-table-row {
  transition: background-color 0.3s ease; /* Add transition effect */
}

.custom-table .v-data-table-row:hover {
  background-color: #f0f0f0; /* Change row background color on hover */
}

</style>