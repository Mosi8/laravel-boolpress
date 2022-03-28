<template>
    <div class="container">
        <div v-for="(post, index) in posts" :key="index">
            <h4>{{post.title}}</h4>
            <p>{{post.content}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Main",
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
