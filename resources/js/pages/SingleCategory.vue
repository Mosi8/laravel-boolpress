<template>
    <div>
        <h1>{{category.title}}</h1>
        <div v-for="post in category.posts" :key="post.slug">
            <h4>{{post.title}}</h4>
            <router-link :to="{ name: 'single-post', params: { slug: post.slug  } }" class="d-block">Visualizza Post</router-link>
        </div>
    </div>
  
</template>

<script>
export default {
    name: "SingleCategory",
    data() {
        return {
            category: {}
        }
    },
    created() {
        axios.get(`/api/categories/${this.$route.params.slug}`)
        .then((response)=> {
            this.category = response.data;
        }).catch( (error) => {
            this.$router.push({name: 'page-404'});
        })
        
    }
}
</script>

<style>

</style>