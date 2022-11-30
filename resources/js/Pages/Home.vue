<template>
    <Head>
        <title>Accueil</title>
    </Head>
    <Header/>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="../assets/carousel1.jpg" class="d-block w-100" alt="carousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5><img src="../assets/atb.png" width="150px" height="150px" alt="logo"></h5>
                    <p> <b>A</b>cting <b>T</b>ogether for <b>B</b>iodiversity ONG</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../assets/carousel2.jpg" class="d-block w-100" alt="carousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5><img src="../assets/atb.png" width="150px" height="150px" alt="logo"></h5>
                    <p> <b>A</b>cting <b>T</b>ogether for <b>B</b>iodiversity ONG</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/carousel3.jpg" class="d-block w-100" alt="carousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5><img src="../assets/atb.png" width="150px" height="150px" alt="logo"></h5>
                    <p> <b>A</b>cting <b>T</b>ogether for <b>B</b>iodiversity ONG</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid description-section">
        <div class="container-title">
            <p class="h3 mb-0"><span>&nbsp;</span>Description</p>
            <span class="d-block mt-0">Tout les axes de notre ONG</span>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-2">
            <div class="col description-card-col">
                <div class="card h-100">
                    <img src="../assets/vision.png" class="card-img-top" alt="vision">
                    <div class="card-body">
                        <h5 class="card-title">Vision</h5>
                        <p class="card-text">La construction d’un monde où les Ressources Naturelles sont exploitées de façon durable et responsable par des populations locales autonomes.</p>
                    </div>
                </div>
            </div>
            <div class="col description-card-col" >
                <div class="card h-100">
                    <img src="../assets/mission.png" class="card-img-top" alt="mission">
                    <div class="card-body">
                        <h5 class="card-title">Mission</h5>
                        <p class="card-text">Promouvoir le développement durable par la conservation de la biodiversité, la valorisation des ressources naturelles et une autonomisation des populations locales.</p>
                    </div>
                </div>
            </div>
            <div class="col description-card-col">
                <div class="card h-100">
                    <img src="../assets/objectif.png" class="card-img-top" alt="objectifs">
                    <div class="card-body">
                        <h5 class="card-title">Objectifs</h5>
                        <p class="card-text">Promouvoir la protection de la biodiversité Sensibiliser les communautés locales et la jeunesse sur l’importance des ressources naturelles Créer des moyens d’existences économiques durables pour les communautés locales.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-if="articles.length > 2" class="container-fluid article-section">
        <!-- If we need navigation buttons -->
        <div class="container-title">
            <p class="h3"><span>&nbsp;</span>Article de Blog</p>
            <span>Le sort de nombreuses espèces inquiète la communauté scientifique et écologique</span>
        </div>
        <div class="swipper-custom">
            <swiper :modules="modules" :slides-per-group="1" :space-between="10" :navigation="true" :breakpoints="breakpoints">
                <swiper-slide v-for="article in articles">
                    <div class="card">
                        <img :src="'/storage/articles/' + article.image" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ article.title }}</h5>
                            <p class="card-text">{{ article.description.substring(0, 120) + " ..." }}</p>
                            <a :href="route('actualites.show', article.id)" class="btn"><i class="fa-solid fa-circle-right"></i>Lire la suite</a>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </div>

    <Intervening />
    <Partner /> 
    <Footer />
</template>

<style>
    .carousel-item {
        background: no-repeat scroll center scroll;
        -webkit-background-size : cover;
        background-size: cover;
    }

    .carousel-item::before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background-color: black;
        opacity: 0.7;
    }

    .carousel-caption {
        top: 0;
        bottom: 60%;
        left: 75% !important;
        right: 0;
        display: flex !important;
        flex-direction: column;
        position: absolute !important;
    }

    .carousel-caption > * {
        align-self: center;
        clear: both;
        float: left;
    }

    .carousel-caption p b {
        color: #047a00;
    }

    .description-section .container-title .h3, .article-section .container-title .h3 {
        color: white;
        margin-bottom: 0;
    }

    .description-section .container-title > span,   .article-section  .container-title > span  {
        color: #46A39D;
        display: block;
        margin-bottom: 20px;
    }

    .description-section .container-title .h3 span, .article-section .container-title .h3 span{
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

    .description-section, .article-section {
        padding-left: 30px;
        padding-right: 30px;
        margin-top: 50px;
    }

    .description-card-col:hover {
        transform: scale(1.05);
    }

    .description-card-col .card {
        background-color: rgba(18, 18, 18, 0.8);
        color: white;
        border: 1px solid #212121;
        border-radius: 15px;
        transition: all 0.2s ease;
    }

    .description-card-col .card-img-top {
        width: 90px;
        height: 80px;
        margin-left: 15px;
    }

    .information-section {
        padding-bottom: 20px;
    }

    .information-section > div {
        width: 90%;
     }

     .article-section  .container-title > span {
        margin-bottom: 10px;
     }

     .swipper-custom .swiper-slide:hover {
        transform: translate(0, -10px);
    }

    .swipper-custom .swiper-slide {
        transition: all 0.2s ease;
        margin-bottom: 0 !important;
        margin-top: 10px;
    }

    .swipper-custom .card {
        border: none;
        background: rgba(18, 18, 18, 0.8);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .swipper-custom .card-body {
        display: flex;
        flex-direction: column;
    }

    .swipper-custom .card-title { 
        color: #46A39D;
        font-size: 1rem;
    }

    .swipper-custom .card-text {
        color: white;
    } 

    .swipper-custom .btn {
        background-color: #172831;
        border-radius: 50px;
        border-color: #46A39D;
        align-self: center;
        color: white;
        transition: all 0.2s ease;
    }

    .swipper-custom .btn:hover {
        transform: scale(0.9);
    }

    .swipper-custom .btn i {
        color: #46A39D;
        margin-right: 10px;
        font-size: 20px;
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

    .swipper-custom .card-img-top {
        height: 200px;
        background: no-repeat scroll center scroll;
    }

    @media screen and (max-width: 767px) {
        .carousel-caption {
          visibility: hidden;
        }
    }

</style>

<script>
    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import Intervening from '../Layouts/Intervening.vue';
    import Partner from '../Layouts/Partner.vue';
    import { Navigation } from 'swiper';
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import { Link, Head } from '@inertiajs/inertia-vue3'; 

    import 'swiper/css';
    import 'swiper/css/navigation';

    export default {
        name: "Home",
        components: { 
            Header, Footer, Swiper, SwiperSlide, Intervening, Partner,
            Head, Link,
        },
        props: {
            articles: Object,
        },
        setup() {
            return {
                modules: [Navigation],
                breakpoints: {
                    992: {
                        slidesPerView: 3,
                        spaceBetween:10,
                    },
                
                    768: {
                        slidesPerView: 2,
                        spaceBetween:10,
                    },
                },
            }
        }
    }
</script>