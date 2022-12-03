<template>
    <Head>
        <title>Gallery</title>
    </Head>
    <Header />
    <Thumb :id="id" />
    <main>
        <span id="path-from-to"><Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;Galerie Média</span>
        <div class="container-fluid gallery-section mt-3" v-if="(albums.data.length > 0 || $page.props.auth.user)">
            <div class="container-title">
                <p class="h3"><span>&nbsp;</span>Notre Galerie Média</p>
            </div>
            <div class="row mt-2 gy-4">
                <div v-if="$page.props.auth.user" class="col-lg-3 col-md-4 col-sm-6" id="add-album">
                    <Link :href="route('albums.create')" class="d-flex flex-direction-column justify-content-center text-decoration-none"><i class="fa-solid fa-plus align-self-center"></i></Link>
                    <h6 class="text-light mt-2">Créer un album</h6>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" v-for="album in albums.data" :key="album.id">
                    <Link v-if="$page.props.auth.user" :href="route('albums.show', album.id)">
                        <video v-if="(album.lastImage).includes('mp4')" controls class="media-videos">
                            <source :src="'/storage/media/' + album.lastImage" type="video/mp4">
                        </video>
                        <img v-else :src="'/storage/media/' + album.lastImage" alt="">
                    </Link>
                    <Link v-else href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="getId">
                        <video v-if="(album.lastImage).includes('mp4')" controls class="media-videos">
                            <source :src="'/storage/media/' + album.lastImage" type="video/mp4">
                        </video>
                        <img v-else :src="'/storage/media/' + album.lastImage" alt="" :data-id="album.id">
                    </Link>
                    <Link v-if="$page.props.auth.user" :href="route('albums.show', album.id)" class="text-decoration-none">
                        <h6 class="text-light mt-2">Album {{ album.title }}</h6>
                    </Link>
                   <Link v-else href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="getId">
                        <h6 class="text-light mt-2" :data-id="album.id">Album {{ album.title }}</h6>
                    </Link>
                    <div  v-if="$page.props.auth.user" class="dropdown">
                        <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-ellipsis"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><Link class="dropdown-item" :href="route('albums.actualites.create', album.id)"><i class="fa-solid fa-file-pen"></i> &nbsp; Rediger Actualité</Link></li>
                            <li><Link class="dropdown-item" :href="route('albums.destroy',album.id )" method="delete"><i class="fa-solid fa-trash"></i> &nbsp;Supprimer Album</Link></li>
                        </ul>
                    </div>
                </div>
                <Pagination :links="albums.links" />
            </div>
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

    .gallery-section .container-title .h3{
        color: white;
        margin-bottom: 0;
    }

    .gallery-section .container-title .h3 span {
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

    .gallery-section { 
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px 20px 30px 20px;
    }

    .gallery-section .row div > a:first-child  img, .gallery-section .row div > a:first-child > video{
        width: 100% !important;
        height: 200px;
    }

    .gallery-section .row div {
        position: relative;
    }

    .gallery-section .row div .dropdown {
        position: absolute !important;
        top: 5px;
        right: 25px;
    }

    .gallery-section .row div .dropdown > a {
         background-color: rgba(9, 20, 25, 0.69);
         border-radius: 100%;
    }

    .gallery-section .row div .dropdown a > i {
        color: white;
    }

    .gallery-section .row div .dropdown-menu {
        background-color: #13242C;
    }

    .gallery-section .row div .dropdown-menu li a {
        color: white;
    }

    .gallery-section .row div .dropdown-menu li a:hover {
        background-color: rgba(9, 20, 25, 0.69);
    }


    .gallery-section .row #add-album a {
        height: 200px;
        color: white;
        width: 100%;
        background-color: #091419;
    }
    
    .gallery-section .row > div > a:nth-child(2) {
        display: inline-block;
        width: fit-content;
    }

    .empty-text {
        color: #46A39D;
    }

    .modal-content {
        background-color: #101F26;
    }

    .modal-header > h1 {
        color: #46A39D;
    }

    .modal-content .swiper {
        height: 80%;
        background-size: cover;
        background-position: center;
    }

    .modal-content .swiper .swiper-wrapper {
        height: 100%;
        width: 100%;
    }

    .modal-content .swiper .swiper-wrapper .swiper-slide {
        height: 100%;
        width: 100%;
    }

    .modal-content .swiper img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: fill !important;
        object-position: center;
    }

    .modal-content .swiper:nth-child(2) {
        margin-top: 10px;
        height: 20%;
    }

    .swiper-button-prev, .swiper-button-next {
        background-color: #172831;
        color: white;
        border-radius: 100%;
        height: 40px;
        width: 40px;
    } 

    .swiper-button-next::after, .swiper-button-prev::after {
        font-size: 20px;
        font-weight: bold;
    }

    .media-videos {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>

<script>
    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import Thumb from '../Layouts/Thumb.vue';
    import Pagination from '../Components/Pagination.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3'; 
    export default {
        name: "Domain",
        components: { Header, Footer, Link, Head, Thumb, Pagination, Thumb },
        props: {
            albums : Object,
        },
        data() {
            return {
                id:null,
            }
        },
        methods: {
            getId(e) {
                this.id = parseInt(e.target.dataset.id);
            }
        }
    }
</script>