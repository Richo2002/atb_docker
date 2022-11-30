<template>
    <Head>
        <title>Contact</title>
    </Head>
    <Header/>
    <main>
        <span id="path-from-to"><Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;Contact</span>
        <h4 class="text-center text-light mt-5">Contactez-nous </h4>
        <p class="text-center text-light">Nous somme disponible 24h/24 et 7 jours sur 7</p>
        <div class="container-fluid contact-section mt-3 text-light py-5">
            <div class="row text-center">
                <div class="col-md-4 mb-md-0 mb-5">
                    <i class="fa-solid fa-phone"></i>
                    <h5 class="mb-2">Par téléphone </h5>
                    <span class="mb-2">Appelez-nous via l’un de ces contacts</span>
                    <span>+229 01 85 53 14 55</span>
                    <span>+229 01 85 53 14 55</span>
                </div>
                <div class="col-md-4 mb-md-0 mb-5">
                    <i class="fa-solid fa-envelope"></i>
                    <h5 class="mb-2">Par mail</h5>
                    <span class="mb-2">Ecrivez nous sur l’adresse mail </span>
                    <span>atbserviceclient@atb.com</span>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-globe"></i>
                    <h5 class="mb-3">Par Nos reseaux</h5>
                    <span id="social-media" class="d-flex justify-content-center gap-2">
                        <a href="#" class="btn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" class="btn"><i class="fa-brands fa-instagram-square"></i></a>
                        <a href="#" class="btn"><i class="fa-brands fa-facebook-f"></i></a>
                    </span>
                </div>
            </div>
        </div>
        <form @submit.prevent="submit" class="row g-3 mt-4 d-flex flex-direction-column justify-content-center">
            <div class="col-md-4">
                <input type="text" class="form-control" id="inputText4" placeholder="Nom & prenom" required v-model="form.fullName">
                <div v-if="errors.fullName" style="color: red;">{{ errors.fullName }}</div>
            </div>
            <div class="col-md-4">
                <input type="email" class="form-control" id="inputEmail4" placeholder="Adresse email" required v-model="form.email">
                <div v-if="errors.email" style="color: red;">{{ errors.email }}</div>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="inputText4" placeholder="Objet" required v-model="form.object">
                <div v-if="errors.object" style="color: red;">{{ errors.object }}</div>
            </div>
            <div class="col-md-8">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" required v-model="form.message"></textarea>
                <div v-if="errors.message" style="color: red;">{{ errors.message }}</div>
            </div>
            <div class="col-md-8">
                <button type="submit"  :disabled="form.processing" >Envoyer</button>
            </div>
        </form>
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
    
    .contact-section {
        background-color: rgba(20, 37, 46, 0.8);
        border-radius: 7px;
    }

    .contact-section div div span {
        display: block;
        margin: auto;
    }

    .contact-section div div span a {
        margin-right: 0 !important;
    }

    .contact-section div div > i {
        font-size: 35px;
        color: #46A39D;
        margin-bottom: 10px;
    }

    main form  input, main form  textarea {
        background-color: rgba(20, 37, 46, 0.8) !important;
        border: none !important;
        padding-top: 10px !important;
        padding-bottom: 15px !important;
        color: white !important;
    }

    main form  textarea {
        min-height: 250px !important;
    }

    main form button {
        padding: 10px 50px;
        background-color: #172831;
        color: white !important;
        border: 1px solid #46A39D;
        border-radius: 0;
        transition: all 0.2s ease;
    }

    main form button:hover {
        transform: scale(0.9);
    }

    input::placeholder, textarea::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }


</style>


<script>
    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import { Link, Head, useForm } from '@inertiajs/inertia-vue3'; 
import { Inertia } from '@inertiajs/inertia';
    export default {
        name: "Domain",
        components: { Header, Footer, Link, Head },
        props: {
            errors: Object,
        },
        data() {
            return {
                form: useForm({
                    fullName: null,
                    email: null,
                    object: null,
                    message: null,
                }),
            }
        },
        methods: {
            submit() {
                Inertia.post('contacts', this.form);
            }
        }
    }
</script>