<template>
    <Head>
        <title>Ajout d'album</title>
    </Head>
    <Header />
    <main>
        <div class="album_creation text-light">
            <div class="album_form ps-2">
                <h3 class="mb-3">Créer un album</h3>
                <form @submit.prevent="submit">
                    <div class="title_album mb-3">
                        <input class="text-light" type="text" name="" id="" placeholder="Titre" v-model="form.title" required>
                        <div v-if="errors.title" style="color: red;">{{ errors.title }}</div>
                    </div>
                    <div class="image_or_video mb-3">
                        <input type="file" multiple class="input-file" id="file" accept="image/* video/*" @input="form.media = $event.target.files" @change="onChangeInputLeft" ref="fileInputLeft" required>
                        <label for="file">
                            <i class="fa-solid fa-images"></i>
                            <span>Importer des photos ou des vidéos</span> 
                        </label>
                        <div v-if="errors.media" style="color: red;">{{ errors.media }}</div>
                        <div v-if="Object.keys(errors).pop()" style="color: red;">{{ errors[Object.keys(errors).pop()] }}</div>
                    </div>
                    <button type="submit" :disabled="form.processing">Poster</button>
                </form>
            </div>
            <div class="image_upload">
                <div class=" bg-gray-100 image_upload_and_text" 
                        @dragover="dragover" 
                        @dragleave="dragleave" 
                        @drop="drop">
                    <input type="file" multiple 
                            name="fields[assetsFieldHandle][]" 
                            id="assetsFieldHandle" 
                            class="w-px h-px opacity-0 overflow-hidden absolute" 
                            @change="onChangeInputRight" 
                            @input="form.media = $event.target.files"
                            ref="fileInputRight" accept="image/* video/*" />
                
                    <label for="assetsFieldHandle" class="block cursor-pointer">
                        <i class="fa-solid fa-photo-film"></i>
                    <div>
                        Prêt à ajouter quelque chose ? 
                        Faites glisser des photos et des vidéos ici pour commencer.
                        ou <span style="text-decoration:underline; cursor: pointer; ">clicker ici</span> pour téléverser les fichiers (images ou video)
                    </div>
                    <div v-if="errors.media" style="color: red;">{{ errors.media }}</div>
                    </label>
                    <ul v-if="this.filelist.length" v-cloak>
                        <li  v-for=" (file, index) in filelist" v-bind:key="index">
                        {{ file.name }} <button :disabled="form.processing" type="button" @click="remove(filelist.indexOf(file))" title="Remove file">Supprimer</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</template>

<script>

import Header from "../Layouts/Header.vue";
import Footer from '../Layouts/Footer.vue';
import { Link, Head, useForm } from '@inertiajs/inertia-vue3'; 
import { Inertia } from "@inertiajs/inertia";

export default {
  name: 'NewAlbum',
  delimiters: ['${', '}'], 
  components: {Header, Footer, Link, Head},
  props: {
    errors : Object,
  },
  data() {
    return {
        filelist: [], // Store our uploaded files
        form: useForm({
            title: null,
            media: null,
       }),
    }
  },
  methods: {
    onChangeInputLeft() {
      this.filelist = [...this.$refs.fileInputLeft.files];
    },
    onChangeInputRight() {
      this.filelist = [...this.$refs.fileInputRight.files];
    },
    remove(i) {
      this.filelist.splice(i, 1);
    },
    dragover(event) {
      event.preventDefault();
      // Add some visual fluff to show the user can drop its files
      if (!event.currentTarget.classList.contains('bg-green-300')) {
        event.currentTarget.classList.remove('bg-gray-100');
        event.currentTarget.classList.add('bg-green-300');
      }
    },
    dragleave(event) {
      // Clean up
      event.currentTarget.classList.add('bg-gray-100');
      event.currentTarget.classList.remove('bg-green-300');
    },
    drop(event) {
      event.preventDefault();
      this.$refs.file.files = event.dataTransfer.files;
      this.onChange(); // Trigger the onChange event manually
      // Clean up
      event.currentTarget.classList.add('bg-gray-100');
      event.currentTarget.classList.remove('bg-green-300');
    },
    submit() {
        this.form.media = this.filelist;
        Inertia.post(route("albums.store"), this.form);
    }
  }
}

</script>


<style scoped>
    [v-cloak] {
        display: none;
    }

    main {
        width: 100%;
        min-height: 100vh;
        position: relative;
    }

    input{background-color: #091419; border: none; border-radius: 7px; padding: 10px 8px; width: 85%;}

    input[type="file"]{
        display: none;
    }

    .album_creation{
        background-color: #101F26;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

    .album_form{
        background-color: #172831;
        width: 45%;
        height: 100%;
        display: inline-block;
    }

    form button {
        padding: 10px 50px;
        background-color: #101F26;
        color: white !important;
        border: 1px solid #46A39D;
        border-radius: 0;
        transition: all 0.2s ease;
    }

    form button:hover {
        transform: scale(0.9);
    }

    .image_upload{
        float: right;
        width: 55%;
        height: 100%;
        position: relative;
    }

    .image_upload_and_text{
        margin-top:10px ;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
    }

    .input-file {
        cursor: pointer;
        color: #ffffff;
        font-weight: bold;
    }

    .image_upload_and_text i {font-size: 50px; margin: 5px 40%;}

    /* .image_upload_and_text p{max-width: 80%;} */

    .image_or_video{
        width: 85%;
    }

    .image_or_video label{
    background: #101F26;
    width: 100%;
    padding: 10px 8px;
    border-radius:7px ;
    font-weight: bold;
    cursor: pointer;

    }

    .image_or_video label:hover {
        background: #0d1a20; 
        transition: 0.3s;
    }

    .image_or_video label i, .image_or_video label span{
        margin-left: 12px;font-size: 18px;
    }

</style>