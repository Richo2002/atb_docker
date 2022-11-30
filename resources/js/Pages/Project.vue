<template>
    <Head>
        <title>Projets</title>
    </Head>
    <Header />
    <main>
        <span id="path-from-to"><Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;Nos projets</span>
        <div class="container-fluid project-section mt-3" v-if="projects.data.length > 0">
            <div class="container-title">
                <p class="h3"><span>&nbsp;</span>Nos projets</p>
            </div>
            <p class="w-75 text-light mt-3 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
            </p>
            <Link v-if="$page.props.auth.user" :href="route('projects.create')" class="btn mb-5">Ajouter un Projet</Link>
            <div v-for="project in projects.data" :key="project.id" class="row row-cols-md-2 row-cols-1 mb-5 text-light">
                <div class="col-md-9 mb-3">
                    <h5>{{ project.title }}</h5>
                    <p>{{ project.description }}</p>
                    <div v-if="$page.props.auth.user" class="d-flex flex-row mt-md-0 mt-3 admin-link-animate">
                        <Link :href="route('projects.edit', project.id)" class="text-decoration-none me-5 text-light"><h6><i class="fa-solid fa-pen-to-square"></i> &nbsp;Modifier</h6></Link>
                        <Link :href="route('projects.destroy', project.id)" method="delete" class="text-decoration-none text-light"><h6><i class="fa-solid fa-trash"></i> &nbsp;Supprimer</h6></Link>
                    </div>
                </div>
                <div class="col-md-3 col-8 d-flex">
                    <img :src="'/storage/projects/' + project.image" class="img-fluid align-self-center" alt="">
                </div>
            </div>
            <Pagination :links="projects.links" />
        </div>
        <div class="row my-5 empty-text" v-else>
                <h5 class="text-center">Aucune information disponible</h5>
        </div>
    </main>
    <Footer/>
</template>
<style scoped>
    main {
        width: 100%;
        padding: 30px 10px 0px 10px;
    }

    #path-from-to {
        color: rgba(255, 255, 255, 0.5);
    }

    .project-section .container-title .h3{
        position: relative;
        color: white;
        margin-bottom: 0;
    }

    .project-section .container-title .h3 span {
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

   .project-section { 
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px 20px 30px 20px;
    }

    .project-section .row .col-md-3 {
        background: no-repeat scroll center scroll;
    }

    .project-section .row .col-md-3 img {
        height: 200px;
        width: 90%;
    }

    .project-section div div h5 {
        color: #46A39D;
    }

    .project-section > .btn {
        background-color: rgba(255, 255, 255, 0.1);
        background-blend-mode: screen !important;
        border-radius: 0px;
        color: white;
        border: 2px solid #46A39D;
        transition: all 0.2s ease;
    }

    .project-section > .btn:hover {
        transform: scale(0.9);
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

</style>

<script>
    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import Pagination from '../Components/Pagination.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3'; 
    export default {
        name: "Domain",
        components: { Header, Footer, Link, Head, Pagination },
        props: {
            projects : Object,
        }
    }
</script>