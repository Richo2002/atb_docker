<template>
    <Head>
        <title>A propos</title>
    </Head> 
    <Header/>
    <main>
        <span id="path-from-to"><Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;A propos</span>
        <div class="container-fluid about-section mt-3">
            <div class="container-title">
                <p class="h3"><span>&nbsp;</span>A propos</p>
            </div>
            <div class="row">
                <div class="col-8">
                    <h5>Qui sommes-nous ?</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus voluptates, at sit minima error saepe omnis. Magnam nisi, quas eius et amet neque possimus repellendus deleniti. Itaque nemo earum asperiores!
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus voluptates, at sit minima error saepe omnis. Magnam nisi, quas eius et amet neque possimus repellendus deleniti. Itaque nemo earum asperiores!
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus voluptates, at sit minima error saepe omnis. Magnam nisi, quas eius et amet neque possimus repellendus deleniti. Itaque nemo earum asperiores!
                    </p>
                </div>
                <div class="col-4 pt-4">
                    <img src="../assets/atb.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5>Notre histoire </h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est vel quos qui iusto assumenda nemo aspernatur voluptatum eius accusantium, reiciendis quidem sit nesciunt unde deleniti? Facilis, aliquam. Illum, quasi repellendus.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus voluptates, at sit minima error saepe omnis. Magnam nisi, quas eius et amet neque possimus repellendus deleniti. Itaque nemo earum asperiores!
                    </p>
                </div>
                <div class="col-12">
                    <h5>Notre Vision </h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio rem architecto nesciunt distinctio sapiente libero saepe, unde eos, dicta fugit itaque accusamus hic rerum soluta laborum tenetur, voluptates eaque dolores.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos facilis inventore, incidunt omnis, sed est itaque at tempora voluptatum aspernatur iste saepe error magni quasi ipsam quam deserunt recusandae?
                    </p>
                </div>
            </div>
            <Intervening/>
            <Partner/>
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

    .about-section .container-title .h3{
        color: white;
        margin-bottom: 0;
    }

    .about-section .container-title .h3 span {
        display: inline-block;
        width: 25px;
        font-size: 10px;
        border-top: 3px solid #46A39D;
        margin-right: 5px;
    }

    .about-section {
        background-color: rgba(20, 37, 46, 0.8);
        padding: 20px;
    }

    .about-section  p {
        color: white;
    }

    .about-section h5 {
        color: #46A39D;
        margin-top: 40px;
    }

    .about-section .intervenant-section, .about-section .partenaire-section {
        margin-left: 0;
        margin-right: 0;
    }
    
    


</style>

<script>
    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3'; 
    import Intervening from '../Layouts/Intervening.vue';
    import Partner from '../Layouts/Partner.vue';
    export default {
        name: "AboutUs",
        components: { Header, Footer, Link, Head, Intervening, Partner }
    }
</script>