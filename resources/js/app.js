import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import {createApp} from 'vue/dist/vue.esm-bundler.js'

import wysiwyg from "vue-wysiwyg";
import VueDatePicker from '@vuepic/vue-datepicker';

import App from "./components/product/App.vue"
import ProductList from "./components/product/Product.vue"
import FilterCat from "./components/product/Filter.vue"
import CreateProduct from "./components/product/CreateProduct.vue"
// import EditProduct from "./components/product/EditProduct.vue"
import router from "./router/index"
const app = createApp({
    components: {
        App,
        ProductList,
        FilterCat,
        CreateProduct,
        wysiwyg,
        Datepicker: VueDatePicker

    }
});
app.use(router);
app.mount("#app")
