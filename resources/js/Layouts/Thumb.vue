<template>
    <div class="modal fade text-light" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 v-if="thumbs" class="modal-title fs-5" id="staticBackdropLabel">Album {{ thumbs.title }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">    
                    <!-- swiper1 -->
                    <swiper :modules="[Thumbs, Navigation]" :loop="true" :navigation="true" :thumbs="{swiper: thumbsSwiper}">
                        <swiper-slide v-for="thumb in thumbs.medias" :key="thumb.id">
                            <video v-if="(thumb.image).includes('mp4')" controls class="media-videos">
                                <source :src="'/storage/media/' + thumb.image" type="video/mp4">
                            </video>
                            <img v-else :src="'/storage/media/' + thumb.image" alt="" class="img-fluid">
                        </swiper-slide>
                    </swiper>
                    <!-- swiper2 Thumbs -->
                    <swiper :modules="[Thumbs]"  @swiper="setThumbsSwiper" :slides-per-view="4" :free-mode="true" :watch-slides-progress="true" :space-between="10">
                        <swiper-slide v-for="thumb in thumbs.medias" :key="thumb.id">
                            <video v-if="(thumb.image).includes('mp4')" controls class="media-videos">
                                <source :src="'/storage/media/' + thumb.image" type="video/mp4">
                            </video>
                            <img v-else :src="'/storage/media/' + thumb.image" alt="" class="img-fluid">
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'swiper/css';
    import 'swiper/css/navigation';

    import { ref } from 'vue';
    import { Thumbs, Navigation } from 'swiper';
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import axios from 'axios';

    export default {
        name: 'Thumbs',
        components: {
            Swiper,
            SwiperSlide,
        },
        props: {
            id : Number,
        },
        data() {
            return {
                thumbs: '',
            }
        },
        watch: {
           id() {
                axios({
                    method: "get",
                    url: `/api/albums/${this.id}`
                }).then((response) => {
                    this.thumbs = response.data.data;
                    console.log(`/api/albums/` + this.id);
                });
            }
        }, 
        setup() {
                const thumbsSwiper = ref(null);
                const setThumbsSwiper = (swiper) => {
                    thumbsSwiper.value = swiper;
                };
                return {
                    Thumbs,
                    Navigation,
                    thumbsSwiper,
                    setThumbsSwiper,
                };
            },
        };
</script>