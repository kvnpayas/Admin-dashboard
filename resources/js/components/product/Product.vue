<template>
  <div class="row pl-2 pb-3">
    <select v-model="selectedCategory" @change="filterProducts">
      <option value="All" >All Categories</option>
      <option v-for="cat in cats" :key="cat.id">{{ cat.name }}</option>
      <!-- Add more categories here -->
    </select>
    <div class="form-inline pl-2">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" v-model="search" placeholder="Search by keyword">
      </div>
    </div>
  </div>
  <table class="table table-striped table-dark">
    <!-- Table header here -->
    <thead class="thead-light">
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="product in filteredProducts" :key="product.id">
        <td><img :src="product.image == null ?'/storage/images/default.png' : '/storage/images/'+product.image" class="img-thumbnail d-inline mr-2" style="width: 100px;"
          alt="Avatar" >{{ product.name }}</td>
        <td>{{ product.description }}</td>
        <td>{{ product.category }}</td>
        <td>
          <button type="button" class="btn btn-danger mr-2" @click="deleteProduct(product.id)"> Delete</button>
          <!-- <button type="button" class="btn btn-primary" @click="editProduct(product.id)"> Edit</button> -->
          <router-link :to="{ name: 'edit-product', params: { id: product.id } }" class="btn btn-primary">Edit</router-link>
        </td>
      </tr>
    </tbody>
</table>
<div class="pagination">
  <button :disabled="currentPage === 1" @click="prevPage">Previous</button>
  <span>{{ currentPage }} / {{ totalPages }}</span>
  <button :disabled="currentPage === totalPages" @click="nextPage">Next</button>
</div>
</template>
<script>
export default {
  data() {
    return {
      products: {},
      cats: {},
      search: '',
      selectedCategory: 'All',
      currentPage: 0,
			itemsPerPage: 10,
    };
  },
  computed: {
    filteredProducts() {
      let filteredProducts = this.products;
      if (this.selectedCategory !== "All") {
        filteredProducts = filteredProducts.filter(product => product.category === this.selectedCategory);
      }
      if (this.search !== "") {
        filteredProducts = filteredProducts.filter(product => product.name.toLowerCase().includes(this.search.toLowerCase()) || product.description.toLowerCase().includes(this.search.toLowerCase()));
      }
      return filteredProducts;
    },
    totalPages() {
      return Math.ceil(this.filteredProducts.length / this.itemsPerPage);
    },
    paginatedItems() {
      const startIndex = this.currentPage * this.itemsPerPage,
            endIndex = startIndex + this.itemsPerPage;
      return this.filteredProducts.slice(startIndex, endIndex);
    },
  },
  mounted() {
    this.fetchProducts();
    this.fetchCtegories();
  },
  methods: {
    fetchProducts() {
      axios
        .get(`/api/admin/product`)
        .then((response) => {
          this.products = response.data.products;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    fetchCtegories() {
      axios
        .get(`/api/admin/product`)
        .then((response) => {
          this.cats = response.data.categories;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    deleteProduct(productId) {
      if (confirm('Are you sure you want to delete this product?')) {
        console.log(productId);
        axios.delete(`/api/admin/product/${productId}`).then(() => {
          this.fetchProducts();
        });
      }
    },
    editProduct(productId) {
      console.log(productId)
      this.$router.push(`/admin/product/${productId}`);
      // axios.get(`/api/admin/product/${product}`).then(() => {
      //     this.fetchProducts();
          // window.location.href = `/admin/product/${productId}`;
      //   });
      // Set the selected product for editing
      
      // this.$store.commit('setSelectedProduct', product);
      
      // Navigate to the edit page (assuming you have a route for editing)
      // this.$router.push(`/admin/product/edit/${product.id}`);
      
    }
  //   editProduct(productId) {
  //     console.log(productId)
  //     axios.get(`/api/admin/product/${productId}`).then((response) => {
  //       console.log(response.data.data)
  //     });
  // },
  },
};

</script>