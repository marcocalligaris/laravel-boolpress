<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">{{ title }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'home' }" >Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'about' }" >About</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'contacts' }" >Contacts</router-link>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> -->
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: 'HeaderItem',
        props: ['title'],
    };
</script>