<template>
    <div class="container">
        <div v-for="(post, index) in posts" :key="index">
            <h4>{{post.title}}</h4>
            <div v-if="post.category" class="categories">{{post.category.name}}</div>
            <span v-for="tag in post.tags" :key="tag.slug" class="tags mr-1">{{tag.name}}</span>
            <router-link :to="{ name: 'single-post', params: { slug: post.slug  } }" class="d-block">Visualizza Post</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Posts",
        data() {
            return {
                posts: []
            }
        },
        created() {
            axios.get('/api/posts')
            .then((apirisp)=> {
                this.posts = apirisp.data;
            });
            
        }
    }
</script>

<style scoped lang="scss">

.tags {
    padding: 2px 8px;
    background-color: #0080FF;
    border-radius: 5px;
    color: #fff;
    display: inline-block;
}

.categories {
    padding: 2px 8px;
    background-color: #FF9933;
    border-radius: 5px;
    color: #fff;
    display: inline-block;
}

</style>
