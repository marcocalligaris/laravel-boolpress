<template>
    <div id="home-page">
        <h2 class="font-weight-bold">Elenco dei post</h2>
        <PostsItem />
    </div>
</template>

<script>
import PostsItem from '../posts/PostsItem.vue';
export default {
    name: "HomePage",
    components: { PostsItem }
}
</script>

<style>

</style>