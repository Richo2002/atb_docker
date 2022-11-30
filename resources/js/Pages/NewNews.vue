<template>
    <Head>
        <title>Ajout d'actualités</title>
    </Head>
    <Header />
    <main>
        <span id="path-from-to">
            <Link href="/" class="text-light text-decoration-none">Accueil</Link>&nbsp;<b class="text-light">></b>&nbsp;<Link href="/actualites" class="text-light text-decoration-none">Actualités</Link>&nbsp;<b class="text-light">></b>
             Actualité
        </span>
        <div class="new_News_form mt-3">
            <h4 v-if="article" class="text-light text-center">Modifier actualité</h4>
            <h4 v-else class="text-light text-center">Nouvelle actualité  </h4>
            <div class="News_form  mt-3">
                <form @submit.prevent="storeOrUpdate">
                    <div class="News_photo">
                        <div class="photo centre">
                            <div v-if="article">
                                <input type="file" id="photo" @change="onFileChange" @input="form.image = $event.target.files[0]">
                            </div>
                            <div v-else>
                                <input type="file" id="photo" @change="onFileChange" @input="form.image = $event.target.files[0]" required>
                            </div>
                            <img v-if="url" :src="url" />
                            <label class="centre" for="photo" @click="bgChange"><i class="fa-solid fa-camera centre"></i></label>
                        </div>
                    </div>
                    <div class="d-blcok text-center" v-if="errors.image" style="color: red;" >{{ errors.image }}</div>
                    <p class="text-center text-light">Couverture</p>
                    <div class="col mb-3 mt-3">
                        <input type="text" class="form-control" id="inputText4" placeholder="Titre" v-model="form.title" required ref="title">
                        <div v-if="errors.title" style="color: red;">{{ errors.title }}</div>
                    </div>
                    <div class="col mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description" v-model="form.description" required></textarea>
                        <div v-if="errors.description" style="color: red;">{{ errors.description }}</div>
                    </div>
                    <button v-if="article" type="submit" :disabled="form.processing">Modifier</button>
                    <button v-else type="submit" :disabled="form.processing">Poster</button>
                </form>
            </div>
        </div>
    </main>
    <Footer />
</template>

<script>
import Header from "../Layouts/Header.vue";
import Footer from '../Layouts/Footer.vue';
import { Link, Head, useForm } from '@inertiajs/inertia-vue3'; 
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {Header, Footer, Link, Head},
  name: 'NewNews',
  props: {
    article: Object,
    album: Object,
    errors : Object,
  },
  data() {
    return {
      url: null,
      form: useForm({
        title: null,
        description: null,
        image: null,
       }),
    }
  },
  mounted() {
    if(this.article) {
        this.form.title = this.article.title;
        this.form.description = this.article.description;
        this.form.image = this.article.image;
        this.url = '/storage/articles/' + this.article.image;
    }
 },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.isActive = true;
      
    },
    bgChange(e) {
        e.target.style.opacity = 0;
    },
    storeOrUpdate() {
        if(this.article) {
            console.log(this.form);
            Inertia.post(route("actualites.update", this.article), {
                _method: 'put',
                image : this.form.image,
                title: this.form.title,
                description: this.form.description,
            });
        }else {
            Inertia.post(route("albums.actualites.store", this.album), this.form);
        }
    }
  },
}

</script>


<style scoped>

    main {
        width: 100%;
        padding: 20px 10px 0px 10px;
    }

    #path-from-to {
        color: rgba(255, 255, 255, 0.5);
    }
    .active{color: transparent; background-color: red;}

    input[type="file"]{
        display: none;
    }

    .News_form{
        margin: auto;
        width: 70%;
    }

    .News_photo{
        height: 100px;
        position: relative;
    }

    .photo{
        background: #5e5a5a34;
        height: 90px;
        width: 90px;
        border-radius: 7px;
    }

    .photo img{width: 100%; height: 100%; object-fit: cover;}

    .photo label{
        background-color: #8E8E8E;
        width: 70%;
        height: 70%;
        border-radius: 50%;
        font-size: 30px;
        cursor: pointer;
    }

    .photo label:hover{background-color: #6d6d6d; transition: 0.3s;}

    .centre{
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
    }

    form  input, form  textarea {
        background-color: rgba(20, 37, 46, 0.8) !important;
        border: none !important;
        padding-top: 10px !important;
        padding-bottom: 15px !important;
        color: white !important;
    }

    form  textarea {
        min-height: 250px !important;
    }

    form button {
        padding: 10px 50px;
        background-color: #172831;
        color: white !important;
        border: 1px solid #46A39D;
        border-radius: 0;
        transition: all 0.2s ease;
    }

    form button:hover {
        transform: scale(0.9);
    }

    input::placeholder, textarea::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }
</style>