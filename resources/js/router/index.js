// import {router} from 'vue'
import {createRouter, createWebHistory} from 'vue-router';
import EditProduct from "../components/product/EditProduct.vue";

const routes = [
  // ...other routes
  {
    path: '/admin/product/edit/:id',
    name: 'edit-product',
    component: EditProduct,
  },
];

const router = createRouter({
  history: createWebHistory(), // Use history mode if configured on your server
  routes,
});

export default router;