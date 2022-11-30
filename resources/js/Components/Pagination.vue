<template>
    <div v-if="links.length > 3">
        <nav>
            <ul class="pagination">
                <template v-for="(link, index) in links" :key="index">
                    <li v-if="link.url===null" class="page-item disabled" >
                        <Link class="page-link"><span v-html="link.label"></span></Link>
                    </li>
                    <li v-else class="page-item">
                        <Link v-if="link.active===false" class="page-link text-white" :href="link.url"><span v-html="link.label"></span></Link>
                        <Link v-else class="page-link text-white active" aria-current="page" :href="link.url"><span v-html="link.label"></span></Link>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
</template>

<style scoped>
    .pagination li {
        background-color: #101F26 !important;
        
    }

    .pagination li a {
        background: none;
        border-color: rgba(255, 255, 255, 0.3);
    }

    .pagination li .active {
        background-color: #46A39D;
    }


</style>

<script>
import { Link } from '@inertiajs/inertia-vue3'; 

export default {
    name: "Pagination",
    components: {
        Link,
    }
    ,
    props: {
        links: Array,    
    },
}
</script>