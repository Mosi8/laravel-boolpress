<template>
    <div>
        <h1>{{post.title}}</h1>
        <div v-if="post.category" class="categories mr-1">{{post.category.name}}</div>
        <span v-for="tag in post.tags" :key="tag.slug" class="tags mr-1">{{tag.name}}</span>
        <p class="mt-2">{{post.content}}</p>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
            return {
                post: {}
            }
        },
        created() {
            axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response)=> {
                this.post = response.data;
            })
            
        }
}
</script>

<style scoped lang= "scss">


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