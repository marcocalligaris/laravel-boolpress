<template>
    <section id="posts-list">
        <div v-if="posts.length">
            <PostCardItem v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        <p v-else>Nessun post da mostrare</p>
    </section>
</template>

<script>
import PostCardItem from "./PostCardItem.vue";
export default {
    name: "PostsItem",
    data() {
        return {
            posts: [],
        };
    },
    methods: {
        fetchPosts() {
            axios.get("http://localhost:8000/api/posts").then(res => {
                this.posts = res.data;
            }).catch((err) => {
                console.error(err);
            }).then(() => {
                console.log("Chiamata terminata");
            });
        },
    },
    mounted() {
        this.fetchPosts();
    },
    components: { PostCardItem }
}
</script>

<style>

</style>