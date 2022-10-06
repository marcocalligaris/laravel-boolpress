<template>
  <div class="card bg-light mb-3">
    <div class="card-header">Pubblicato il: {{ createdAt }}</div>
    <div class="card-body">
      <h5 class="card-title font-weight-bold">{{ post.title }}</h5>
      <p class="card-text">{{ post.content }}</p>
      <div class="d-flex justify-content-end">
        <router-link :to="{ name: 'post-details', params: { id: post.id} }" class="btn btn-success">Vedi</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'PostCardItem',
    props: ['post'],
    computed: {
        createdAt(){
            const creationDate = new Date(this.post.created_at);
            let day = creationDate.getDate();
            let month = creationDate.getMonth() + 1;
            let year = creationDate.getFullYear();

            if(day < 10) day = '0' + day;
            if(month < 10) month = '0' + month;
            return `${day}/${month}/${year}`;
        },
    },
};
</script>

<style>

</style>