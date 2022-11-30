<template>
    <div class="partenaire-section d-flex">
        <span class="h3 text-light align-selft-center">Nos partenaires</span>
        <p class="text-center text-light mt-1">Retouvez nos articles, nos guides et nos classements grâce à nos partenaires d'edition</p>
        <div class="d-flex flex-direction-row justify-content-xl-between justify-content-center flex-wrap gap-5">
            <div class=" mt-1">
                <Link href="#"><img src="../assets/partenaire1.png" alt=""></Link>
            </div>
            <div class=" mt-1">
                <Link href="#"><img src="../assets/partenaire2.png" alt=""></Link>
            </div>
            <div class=" mt-1">
               <Link href="#"> <img src="../assets/partenaire3.png" alt=""></Link>
            </div>
            <div class=" mt-1">
                <Link href="#"><img src="../assets/partenaire4.png" alt=""></Link>
            </div>
            <div class=" mt-1">
                <Link href="#"><img src="../assets/partenaire5.png" alt=""></Link>
            </div>
        </div>
    </div>
</template>

<style>
    .partenaire-section {
        flex-direction: column;
        margin: 0 30px;
        margin-top: 50px;
        padding-left: 0;
    }

    .partenaire-section > div{
        width: 80%;
        margin: auto; 
        padding: 5px;
    } 

    .partenaire-section > span {
        display: block;
        align-self: center;
        border-bottom: 3px solid #46A39D;
    }

    .partenaire-section > div > div > a, .partenaire-section > div > div > a > img {
        width: 110px;
        height: 110px;
        display: block;
    }


    .partenaire-section > div > div  > a {
        transition: all 0.2s ease;
    }

    .partenaire-section > div > div > a:hover {
        transform: translate(0, -5px);
    }


    @media screen and (max-width: 767px) {
        .partenaire-section > div {
           width: 90%;
        }
    }
</style>

<script>        
    import { Link } from '@inertiajs/inertia-vue3'; 
    export default {
        name: "Partner",
        components: { Link }
    }
</script>