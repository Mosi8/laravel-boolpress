<template>
    <div>
        <Header/>
        <Main/>
        <Footer/>
    </div>
</template>

<script>
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Main from './components/Main.vue'

export default {
    name: "App",
    components: { 
        Header, 
        Main, 
        Footer 
    },
    
}
</script>

<style>

</style>