<template>

  <!-- Product creation form -->
  <form @submit.prevent="createProduct" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" v-model="newProduct.name">
        <div class="text-danger" v-if="nameError">{{ nameError }}</div>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" v-model="newProduct.description"></textarea>
      <div class="text-danger" v-if="descriptionError">{{ descriptionError }}</div>
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" id="category" v-model="newProduct.category_id" >
        <option v-for="cat in cats" :key="cat.id" :value="cat.id">{{ cat.name }}</option>

      </select>
      <div class="text-danger" v-if="categoryError">{{ categoryError }}</div>
    </div>
     <div class="form-group col-4">
      <label for="images">Images</label>
      <input type="file" id="images" ref="imageInput" class="form-control" @change="handleImageUpload" multiple>

      <div v-if="newProduct.images.length > 0">
        <ul>
          <li v-for="(image, index) in newProduct.images" :key="index">{{ image.name }}</li>
        </ul>
      </div>
      <div class="text-danger" v-if="imageError">{{ imageError }}</div>
    </div>
    <div class="form-group col-4">
      <label for="date">Date</label>
      <VueDatePicker v-model="newProduct.date"></VueDatePicker>
      <div class="text-danger" v-if="dateError">{{ dateError }}</div>
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
  </form>
</template>
<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import Multiselect from 'vue-multiselect';
export default {
components: { VueDatePicker, Multiselect },
props: ['authUser'],
  data() {
    return {
        cats: {},
        newProduct: {
            name: '',
            description: '',
            category_id: '',
            user_id: this.authUser.id,
            date: null,
            images: [],
        },
        nameError: '',
        descriptionError: '',
        categoryError: '',
        dateError: '',
        imageError: '',
    };
  },
  mounted() {
    this.fetchCtegories();
  },
  methods: {
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
    createProduct() {

        this.nameError = '';
        this.descriptionError = '';
        this.categoryError = '';
        this.dateError = '';
        this.imageError = '';


        if (!this.newProduct.name) {
            this.nameError = 'Name is required.';
        }
         if (!this.newProduct.description) {
            this.descriptionError = 'Description is required.';
        }
         if (!this.newProduct.category_id) {
            this.categoryError = 'Category is required.';
        }
         if (!this.newProduct.date) {
            this.dateError = 'Date is required.';
        }
         if (!this.newProduct.images) {
            this.imageError = 'Image is required.';
        }

        if (this.nameError || this.descriptionError || this.categoryErro || this.dateErrorr || this.imageError) {
            return;
        }
        console.log(this.newProduct.images);
        axios.post('/api/admin/product', this.newProduct, {
          headers: { 
            "Content-Type": "multipart/form-data",
          }
        })
        
        .then((response) => {

          window.location.href = "/admin/product";
            
        })
        .catch((error) => {

            console.error('Error creating product:', error);
        });
    },
    handleImageUpload(event) {
      const selectedImages = event.target.files[0];
      this.newProduct.images = selectedImages;
    },
  },
};
</script>