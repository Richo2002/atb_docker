<template>
    <Head>
        <title>Album</title>
    </Head>
    <Header />
    <main>
        <span id="path-from-to">
            <Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;
            <Link href="/albums" class="text-light text-decoration-none">Galerie Média</Link>&nbsp;<b class="text-light">></b>
            &nbsp;{{ album[0].title }}  
        </span>
        <div class="container-fluid album-admin-section mt-3">
            <div class="container-title">
                <p class="h3"><span>&nbsp;</span>{{  album[0].title }} </p>
            </div>
            <div class="row row-cols-lg-4 row-cols-2 mt-2 g-4">
                <div class="col">
                    <input type="file" class="d-none" ref="file" @change="addMedia">
                    <Link href="#" class="d-flex flex-direction-column justify-content-center text-decoration-none" @click="linkFile"><i class="fa-solid fa-plus align-self-center"></i></Link>
                    <h6 class="text-light mt-2" for="media">Ajouter un média</h6>
                </div>
                <div class="col" v-for="media in medias">
                    <video v-if="(media.image).includes('mp4')" controls class="media-videos">
                        <source :src="'/storage/media/' + media.image" type="video/mp4">
                    </video>
                    <img v-else :src="'/storage/media/' + media.image" alt="" class="img-fluid">
                    <Link :href="route('medias.destroy', media.id)" method="delete" class="text-decoration-none">
                        <h6 class="text-light mt-2"><i class="fa-solid fa-trash"></i> &nbsp;Supprimer</h6>
                    </Link>
                </div>
            </div>
        </div>
    </main>
    <Footer />
</template>

<style>
    main {
        width: 100%;
        padding: 30px 10px 0px 10px;
    }

    #path-from-to {
        color: rgba(255, 255, 255, 0.5);
    }

    .album-admin-section .container-title .h3{
        position: relative;
        color: white;
        margin-bottom: 0;
    }

    .album-admin-section .container-title .h3 span {
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

   .album-admin-section { 
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px 20px 30px 20px;
    }

    .album-admin-section img {
        width: 100%;
        height: 200px;
    }

 .album-admin-section .row div:first-child a {
        height: 200px;
        color: white;
        width: 100%;
        background-color: #091419;
    }
    
    .album-admin-section .row > div > a {
        display: inline-block;
        width: fit-content;
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
    import { Link, Head, useForm } from '@inertiajs/inertia-vue3'; 
    import axios from 'axios';
import { Inertia } from '@inertiajs/inertia';
    export default {
        name: "Album Media",
        components: { Header, Footer, Link, Head },
        props: {
            medias : Object,
            album : Object,
        },
        data() {
            return {
                image : null,
            }
        },
        methods: {
            linkFile(e) {
                e.preventDefault();
                this.$refs.file.click();
            },
            addMedia(e) {
                let formData = new FormData();
                formData.append('image', e.target.files[0])
                formData.append('album_id', this.album[0].id)
                console.log(e.target.files[0]);
                axios.post('/api/medias',formData).then((response) => {
                    if(response.data.image) {
                        alert(response.data.image[0])
                    }
                    else {
                        Inertia.reload({ only: ['medias'] });
                    }
                });
            }
        }
    }
</script>