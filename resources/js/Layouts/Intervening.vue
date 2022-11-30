<template>
    <div class="modal fade text-light" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">PHILIPPE D.</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-light">    
                    This is some placeholder content to show a vertically centered modal. We've added some extra copy here to show how vertically centering the modal works 
                    when combined with scrollable modals. We also use some repeated line breaks to quickly extend the height of the content, thereby triggering the scrolling. 
                    When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <div class="intervenant-section">
        <span class="bande">
            Nos intervenants
        </span>
        <div class="d-flex flex-direction-row justify-content-xl-between justify-content-center flex-wrap gap-5">
            <div>
                <Link data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="../assets/intervenant.png" alt="">
                </Link>
                <span class="d-block text-light ms-3 mt-2 mb-md-0 mb-4">PHYLIPPE D.</span>
            </div>
            <div>
                <Link data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="../assets/intervenant.png" alt="">
                </Link>
                <span class="d-block text-light ms-3 mt-2 mb-lg-0 mb-4">PHYLIPPE D.</span>
            </div>
            <div>                
                <Link data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="../assets/intervenant.png" alt="">
                </Link>
                <span class="d-block text-light ms-3 mt-2 mb-lg-0 mb-4">PHYLIPPE D.</span>
            </div>
            <div>
                <Link data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="../assets/intervenant.png" alt="">
                </Link>
                <span class="d-block text-light ms-3 mt-2 mb-lg-0 mb-4">PHYLIPPE D.</span>
            </div>
            <div>
                <Link data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="../assets/intervenant.png" alt="">
                </Link>
                <span class="d-block text-light ms-3 mt-2 mb-lg-0 mb-4">PHYLIPPE D.</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
     .intervenant-section {
        background-color: #121212;
        margin: 0 30px;
        margin-top: 50px;
        padding-left: 0;
    }

    .intervenant-section {
        padding-bottom: 30px; 
    }

    .intervenant-section > div {
        width: 80%;
        margin: auto; 
        padding: 5px;
    } 

    .intervenant-section > div div a {
        display: block;
       height: 110px;
       width: 110px;
    }

    .intervenant-section > div div a img {
        width: 100%;
        height: 100%;
    }

    .bande {
        display: inline-block;
        background-color: #46A39D;
        padding:  5px 10px;
        margin: 20px 0px;
        color: white;
        text-transform: uppercase;
    }

    .modal-content {
        background-color: #101F26;
    }

    .modal-header > h1 {
        color: #46A39D;
    }

    @media screen and (max-width: 767px) {
        .intervenant-section > div {
           width: 90%;
        }
    }
</style>

<script>
import { Link } from '@inertiajs/inertia-vue3'; 
    export default {
        name: "Intervening",
        components: { Link }
    }
</script>