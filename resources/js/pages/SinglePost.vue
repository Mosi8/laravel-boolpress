<template>
    <div>
        <h1>{{post.title}}</h1>
        <div v-if="post.category" class="categories mr-1">{{post.category.name}}</div>
        <span v-for="tag in post.tags" :key="tag.slug" class="tags mr-1">{{tag.name}}</span>
        <p class="mt-2">{{post.content}}</p>
        <div>
            <h3>Lascia un commento</h3>
            <form @submit.prevent="addComment()">
                <input type="text" id="name" placeholder="Inserisci il nome" v-model="formData.name">
                <textarea id="content" cols="30" rows="10" placeholder="Inserisci il commento" v-model="formData.content"></textarea>

                <div v-if="formErrors.content">
                    <ul>
                        <li v-for="(error, index) in formErrors.content" :key="index">
                            {{error}}
                        </li>
                    </ul>
                </div>

                <button type="submit">Aggiungi Commento</button>
            </form>
            <div v-show="commentSent">
                Commento in attesa di approvazione! Grazie!
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
            return {
                post: {},
                formData: {
                    name: "",
                    content: "",
                    post_id: null
                },
                commentSent: false,
                formErrors: {}
            }
    },
    created() {
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((response)=> {
            this.post = response.data;
            this.formData.post_id = this.post.id; 
        }).catch( (error) => {
            this.$router.push({name: 'page-404'});
        })
        
    },
    methods: {
        addComment() {
            axios
            .post(`/api/comments/`, this.formData)
            .then((response)=> {
                this.formData.name = "";
                this.formData.content = "";
                this.commentSent = true; 
            })
            .catch( (error) => {
                this.formErrors = error.response.data.errors;
                console.log(error.response);
            }) 
            console.log(this.formData);
        }
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