<template>
<h1>Edit</h1>
</template>
<script>
export default {
props: ['authUser', 'id'],
  data() {
    return {
        cats: {},
        product: {},
    };
  },
  mounted() {
    this.fetchProduct();
  },
  methods: {
    fetchProduct() {
      axios
        .get(`/admin/product/edit/${id}`)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>