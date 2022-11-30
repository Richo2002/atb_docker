<template>
    <footer class="d-flex flex-column">
        <span class="h3 d-block mt-5" :class="{ 'atb-animate-enter' : $page.url === '/' }">ATB</span>
        <div class="row mt-auto mb-5 d-flex row-cols-md-3 row-cols-1">
            <div class="col mt-md-0 mt-5 m-md-auto">
                <div class="part1">
                    <h5>Nous contactez</h5>
                    <span>serviceclient@cerda.com</span>
                    <span id="phone"><i class="fa fa-phone"></i> 01 85 53 14 55</span>
                </div>
            </div>
            <div class="col mt-md-0 mt-5">
                <div class="part2">
                    <h5>Nous suivre sur nos reseaux </h5>
                    <span id="social-media">
                        <a href="#" class="btn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" class="btn"><i class="fa-brands fa-instagram-square"></i></a>
                        <a href="#" class="btn"><i class="fa-brands fa-facebook-f"></i></a>
                    </span>
                </div>
            </div>
            <div class="col mt-md-0 mt-4">
                <div class="part3">
                    <h5>S’abonner à la newslatter</h5>
                    <form class="d-flex" role="search" @submit.prevent="submit">
                        <div class="input-group">
                            <input class="form-control" type="email" placeholder="Entrez votre email" aria-label="Search" required v-model="form.email">
                            <div class="input-group-prepend">
                                <button class="btn" type="submit"  :disabled="form.processing" >Newsletter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</template>

<style>
    footer .h3 {
        width: 48px;
        border-bottom: 2px solid #46A39D;
    }

    .atb-animate-enter {
        animation: atb-animate-enter 3s ease-in-out 0.3s 1 normal forwards;
        
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

   footer h5 {
        font-size: 16px !important;
    }

    footer {
        position: relative;
        color: white;
        width: 100%;
        min-height: 400px;
        padding: 60px 30px 0px 30px !important;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 1440 420' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1243.84 166.384C1371.3 154.73 1383.75 252.487 1455.81 257.956C1502.93 261.532 1551.06 196.319 1653.92 181.369C1803.41 159.639 2043.21 196.055 2043.21 196.055V567.32H1014.04L-131.844 599.464V151.053C-109.867 146.767 -92.5774 132.731 -71.7769 110.873C-45.7764 83.5505 -31.8472 110.873 -21.6328 110.873C-11.4182 110.873 33.4459 31.9951 50.1605 6.2798C66.8752 -19.4355 92.8759 43.2455 111.448 60.9248C130.02 78.6041 177.025 53.7536 208.95 43.2455C254.679 28.194 310.918 69.8433 329.49 85.9154C382.134 123.393 422.582 78.5067 462.487 93.1938C524.136 115.884 512.397 148.301 591.327 154.73C670.258 161.158 795.286 94.2143 824.072 78.1423C916.893 26.3183 1015.88 110.873 1070.67 138.196C1125.46 165.518 1207.91 169.67 1243.84 166.384Z' fill='url(%23paint0_linear_1074_685)'/%3E%3Cpath d='M1903.98 352.943C2021.46 287.012 2147.81 325.472 2196.3 352.943V686.764H102.287C81.5062 650.413 52.4131 562.06 102.287 499.458C164.629 421.206 303.168 326.304 402.223 352.943C501.278 379.582 492.966 352.943 549.766 407.886C606.567 462.83 713.934 482.809 847.624 407.886C981.314 332.964 1170.42 329.634 1414.25 407.886C1658.07 486.139 1757.13 435.358 1903.98 352.943Z' fill='url(%23paint1_linear_1074_685)'/%3E%3Cpath d='M-342.421 99.3073C-376.779 117.955 -497.123 172.565 -553 197.539V688.697L1042.96 698.419C941.83 636.549 1006.94 526.93 851.78 453.673C744.551 403.046 653.67 295.77 603.797 279.121C503.501 245.639 445.863 197.539 416.77 167.57C390.629 140.643 355.089 119.322 310.095 109.297C232.812 92.0775 176.821 142.263 114.756 167.57C37.174 199.204 26.0909 224.178 -77.8129 135.936C-181.717 47.6941 -299.475 75.9981 -342.421 99.3073Z' fill='url(%23paint2_linear_1074_685)'/%3E%3Cdefs%3E%3ClinearGradient id='paint0_linear_1074_685' x1='955.684' y1='49.6641' x2='955.684' y2='599.464' gradientUnits='userSpaceOnUse'%3E%3Cstop stop-color='%23101F26'/%3E%3Cstop offset='1' stop-color='%23272C78'/%3E%3C/linearGradient%3E%3ClinearGradient id='paint1_linear_1074_685' x1='1482.34' y1='-148.573' x2='1466.34' y2='1059.2' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0.134655' stop-color='%23047C00'/%3E%3Cstop offset='0.665989' stop-color='%233913B8'/%3E%3C/linearGradient%3E%3ClinearGradient id='paint2_linear_1074_685' x1='204.805' y1='75.731' x2='204.805' y2='588.8' gradientUnits='userSpaceOnUse'%3E%3Cstop stop-color='%23101F26'/%3E%3Cstop offset='1' stop-color='%233913B8'/%3E%3C/linearGradient%3E%3C/defs%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    footer::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 30px;
        background-color: rgba(217, 217, 217, 0.1);
    }


    footer #phone {
        display: block;
        text-align: center;
        padding: 8px 0px;
        background-color: #46A39D;
        border-radius: 20px;
        border: none;
        margin-top: 10px;
        width: 180px;
    }

    footer #phone i {
        font-size: 15px;
        color: black;
        background-color: white;
        border-radius: 100%;
        padding: 5px;
        margin-right: 5px;
    }

   footer .input-group .btn,  footer .input-group .form-control{
        border-radius: 14px;
        border-color:  #46A39D;
    }

    footer .input-group .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        color: white;
        background-color: #46A39D;
    } 

    footer .form-control {
        background: none;
    }

    #social-media {
        display: inline-block;
    }

    #social-media a {
        border-radius: 100%;
        background-color: #46A39D;
        margin-right: 25px;
        transition: all 0.2s ease;
    }

    #social-media a:hover {
        transform: scale(1.2);
    }

    #social-media a i  {
        font-size: 15px;
        color: black;
    }

    @media screen and (max-width: 767px) {
        footer {
            display: flex;
            flex-direction: column;
        }

        .part1, .part2, .part3 {
            display: flex;
            flex-direction: column
        }

        .part1 > * {
            align-self: center;
        }

        .part2 > * {
            align-self: center;
        }

        .part3 > * {
            align-self: center;
        }

        footer .h3 {
            align-self: center;
        }
    }

</style>

<script>
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';


export default {
    name: "Footer",
    data() {
        return {
            form: useForm({
                email: null,
            }),
        }
    },
    methods: {
        submit() {
            Inertia.post('/newsletter', this.form);
            this.form.reset();
        }
    }
    
}
</script>