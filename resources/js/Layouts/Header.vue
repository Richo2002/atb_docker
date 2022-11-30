<template>
    <header class="page-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 me-5 h1 text-light fst-italic" :class="{ 'atb-animate-enter' : $page.url === '/' }">
                    ATB
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars" id="menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-md-0 ms-md-auto mb-2 mb-lg-0">
                        <li class="nav-item me-lg-3" >
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/' }" aria-current="page" href="/">Accueil</Link>
                        </li>
                        <li class="nav-item me-lg-3">
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/domaines' }" href="/domaines">Domaine d'intervention</Link>
                        </li>
                        <li class="nav-item me-lg-3">
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/projects' }" href="/projects">Nos projets</Link>
                        </li>
                        <li class="nav-item me-lg-3">
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/actualites' }" href="/actualites">Actualités</Link>
                        </li>
                        <li class="nav-item me-lg-3">
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/albums' }" href="/albums">Galerie média</Link>
                        </li>
                        <li class="nav-item me-lg-3">
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/a-propos' }" href="/a-propos">À propos</Link>
                        </li>
                        <li class="nav-item me-lg-3">
                            <Link class="nav-link" :class="{ 'active' : $page.url === '/contacts' }" href="/contacts">contact</Link>
                        </li>
                    </ul>
                    <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" class="btn">Se deconnecter</Link>
                </div>
            </div>
        </nav>
    </header>
</template>

<style scoped>
    .navbar {
        background-color: #172831;
    }

    .atb-animate-enter {
        animation: atb-animate-enter 2s ease-in-out 0.3s 1 normal forwards;
        
    }

    @keyframes atb-animate-enter {
        from {
            opacity: 0;
            transform: translate(-25px, 0);
        }

        to{
            opacity: 1;
        }
    }

    header .nav-item > .nav-link {
        color: white !important;
        clear: both !important;
        float: left !important;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    header .nav-item > .nav-link:hover {
        transform: scale(1.1);
    }

    header .nav-item .active {
        border-bottom: 3px solid #ffffff;
    }   
    

    header .navbar div div > a {
        border-color:  #46A39D !important;
        color: white !important;
        background-color: rgb(255, 255, 255, 0.1) !important;
        border-radius: 50px !important;
        transition: all 0.2s ease;
    } 

    header .navbar div div > a:hover {
        transform: scale(0.9);
    }

     .navbar-toggler > i {
        color: white;
     }

</style>

<script>
import { Link } from '@inertiajs/inertia-vue3'; 
export default {
    name: "Header",
    components: { Link },
}
</script>