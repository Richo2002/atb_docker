<template>
    <Head>
        <title>Domaines</title>
    </Head> 
    <Header/>
    <main>
        <span id="path-from-to"><Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;Domaines d’intervention</span>
        <div class="container-fluid domaine-section mt-3">
            <div class="container-title">
                <p class="h3"><span>&nbsp;</span>Domaine d'intervention</p>
            </div>
            <p class="w-75 text-light mt-3">
                Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
            </p>
            <div class="row row-cols-md-2 row-cols-1 gy-4">
                <div class="col">
                    <div class="img-background">
                        <img src="/storage/domains/d1.jpg" alt="" class="img-fluid">
                        <h5>Biodiversité</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="img-background">
                        <img src="/storage/domains/d2.jpg" alt="" class="img-fluid">
                        <h5>Recherche scientifique</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="img-background">
                        <img src="/storage/domains/d3.jpg" alt="" class="img-fluid">
                        <h5>Ecotourisme</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="img-background">
                        <img src="storage/domains/d4.jpg" alt="" class="img-fluid">
                        <h5>Education environnementale</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <Footer/>
</template>

<style>
    main {
        width: 100%;
        padding: 30px 10px 0px 10px;
    }

    #path-from-to {
        color: rgba(255, 255, 255, 0.5);
    }

    .domaine-section .container-title .h3{
        color: white;
        margin-bottom: 0;
    }

    .domaine-section .container-title .h3 span {
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

    .domaine-section { 
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px 20px 30px 20px;
    }

    .domaine-section div div .img-background {
        background-color: #101F26;
        padding: 20px;
    }

    .domaine-section div div .img-background img {
        height: 250px;
        width: 100%;
    }

    .domaine-section div div .img-background h5 {
        background: #172831;
        background-blend-mode: screen;
        border: 2px solid #46A39D;
        margin-bottom: 0;
        margin-top: 5px;
        color: white;
        padding: 10px 0;
        text-align: center;
    }

</style>

<script>
    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3'; 
    export default {
        name: "Domain",
        components: { Header, Footer, Link, Head }
    }
</script>