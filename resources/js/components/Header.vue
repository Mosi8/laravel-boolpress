<template>
    <header class="container">
        <h1 class="text-center m-3">Boolpress</h1>
        <nav class="text-center m-3">
            <router-link :to="{ name: 'home' }" class="mr-3">HOME</router-link>
            <router-link :to="{ name: 'about' }" class="mr-3">CHI SIAMO</router-link>
            <router-link :to="{ name: 'categories' }">CATEGORIE</router-link>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "Header",
    }
</script>
