<template>
    <div class="content">
        <HeaderItem :title="title" />
        <main class="container my-4">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import HeaderItem from './HeaderItem.vue';

export default {
    name: "App",
    components: { 
        HeaderItem, 

    },
    data() {
        return {
            title: "Boolpress",
        };
    },
};
</script>