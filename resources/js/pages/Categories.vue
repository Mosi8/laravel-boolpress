<template>
    <div class="container-grid">
        <div v-for="category in categories" :key="category.slug" class="category">
            <div>{{category.name}} ({{category.posts.length}})</div>
            <router-link :to="{ name: 'single-category', params: { slug: category.slug  } }" class="d-block">Visualizza Categoria</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            categories: []
        }
    },
    created() {
            axios.get('/api/categories')
            .then((response)=> {
                this.categories = response.data;
            });
            
        }
}
</script>

<style>

</style>