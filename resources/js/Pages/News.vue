<template>
    <Head>
        <title>Actualités</title>
    </Head>
    <Header />
    <main>
        <span id="path-from-to"><Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;Actualités</span>
        <div class="container-fluid news-section mt-3" v-if="articles.data.length > 0">
            <div class="container-title">
                <p class="h3"><span>&nbsp;</span>Liste des actualités</p>
            </div>
            <p class="w-75 text-light mt-3 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
            </p>
            <div v-for="article in articles.data"  :key="article.id" class="card mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <Link :href="route('actualites.show', article.id)"><img :src="'/storage/articles/' + article.image" class="img-fluid" alt="..."></Link>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body d-sm-flex flex-sm-column justify-content-sm-between">
                            <Link :href="route('actualites.show', article.id)" class="text-decoration-none"><h5 class="card-title">{{ article.title }}</h5></Link>
                            <p class="card-text"><small class="text-light">par ATB | {{ article.formatted_created_at }}</small></p>
                            <h6>Description</h6>
                            <p class="card-text">{{ article.description.substring(0, 250) + ' ...' }}</p>
                            <div v-if="$page.props.auth.user" class="d-flex flex-row admin-link-animate">
                                <Link :href="route('actualites.edit', article.id)" class="text-decoration-none me-5 text-light"><h6><i class="fa-solid fa-pen-to-square"></i> &nbsp;Modifier</h6></Link>
                                <Link :href="route('actualites.destroy', article.id)" class="text-decoration-none text-light" method="delete"><h6><i class="fa-solid fa-trash"></i> &nbsp;Supprimer</h6></Link>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="line"></div>
                </div>
            </div>
            <Pagination :links="articles.links" />
        </div>
        <div class="row my-5 empty-text" v-else>
                <h5 class="text-center">Aucune information disponible</h5>
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

    .news-section .container-title .h3{
        position: relative;
        color: white;
        margin-bottom: 0;
    }

    .news-section .container-title .h3 span {
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

    .news-section { 
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px 20px 30px 20px;
    }


    .news-section .card {
        background: none;
        border: none;
        color: white;
        margin-bottom: 30px !important;
    }

    .news-section .card .row .col-md-3  img {
        height: 200px;
        width: 100%;
    }

    .news-section .card .row .col-md-9 .card-body{
        padding-top: 0;
        padding-bottom: 0;
        padding-right: 0;
        height: 100%;
    }

    .news-section .card .row .col-md-9 .card-body h5 {
        color: #46A39D;
    }

    .news-section #line {
        background-color: #46A39D;
        height: 1px;
        width: 100%;
        margin-top: 30px;
    }

    .empty-text {
        color: #46A39D;
    }

    .admin-link-animate > a {
        transition: all 0.2s ease;
    }

    .admin-link-animate > a:hover {
        transform: scale(1.1);
    }

    @media screen and (max-width: 768px) {
        .news-section .card .row .col-md-9 .card-body {
            padding-left: 0;
            margin-top: 15px;
        }
    }

</style>

<script>
import Header from "../Layouts/Header.vue";
import Footer from '../Layouts/Footer.vue';
import Pagination from '../Components/Pagination.vue';
import { Link, Head } from '@inertiajs/inertia-vue3'; 
    export default {
        name: "News",
        components: { Header, Footer, Link, Head, Pagination },
        props: {
            articles: Object,
        }
    }
</script>