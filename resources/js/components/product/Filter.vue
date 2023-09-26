<template>
 <select v-model="selectedCategory" @change="filterProducts">
    <option value="">All Categories</option>
    <option v-for="cat in cats" :key="cat.id">{{ cat.name }}</option>
  </select>
</template>
<script>
export default {
  data() {
    return {
      cats: {},
    };
  },
  mounted() {
    this.fetchCtegories();
  },
  methods: {
    fetchCtegories() {
      axios
        .get(`/api/admin`)
        .then((response) => {
          this.cats = response.data.categories;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>