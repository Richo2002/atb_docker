<template>
    <Head>
        <title>Actualités</title>
    </Head>
    <Header />
    <main>
        <span id="path-from-to">
            <Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;
            <Link href="/actualites" class="text-light text-decoration-none">Actualité</Link>&nbsp;<b class="text-light">></b>
            &nbsp;{{ article.title }} 
        </span>
        <div class="container-fluid OneNews-section mt-3">
            <div class="container-title mb-4">
                <p class="h3">{{ article.title }}</p>
            </div>
            <div class="swipper-costum d-block mb-4">
                <swiper :modules="modules" :slides-per-group="1" :navigation="true" :autoplay="autoplay" :loop="true">
                    <swiper-slide v-for="media in medias">
                        <img :src="'../storage/media/' + media.image" class="" alt="...">
                    </swiper-slide>
                </swiper>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12">
                    <p class="text-light">
                        {{ article.description }}
                    </p>
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

    .container-title .h3{
        position: relative;
        color: white;
        margin-bottom: 0;
    }

    .OneNews-section { 
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px 20px 30px 20px;
    }

    .OneNews-section .swipper-costum .swiper {
       margin: 0;
       height: 300px !important;
       max-width: 700px;
    }

    .OneNews-section .swipper-costum .swiper .swiper-wrapper .swiper-slide {
       background: no-repeat scroll center scroll;
        -webkit-background-size : cover;
        background-size: cover;
    }

    .OneNews-section .swipper-costum .swiper  img {
        width:100%;
        height: 100%;
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
</style>

<script>
    import Header from "../Layouts/Header.vue";
    import Footer from '../Layouts/Footer.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3'; 
    import { Navigation, Autoplay } from 'swiper';
    import { Swiper, SwiperSlide } from 'swiper/vue';

    import 'swiper/css';
    import 'swiper/css/navigation';

    export default {
        name: "OneNews",
        components: {Header, Footer, Link, Head, Swiper, SwiperSlide},
        props: {
            article : Object,
            medias : Object,
        },
        setup() {
        return {
            modules: [Navigation, Autoplay],
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
             },
        }
    }
        
    }
</script>