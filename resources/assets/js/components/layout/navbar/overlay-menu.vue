<template>
    <div id="overlay" >
        <div class="row w-100 p-0 m-0 d-flex ">
           
                <div class="col-9 col-lg-4 p-0">
                    <ul v-on-click-outside="close"> 
                        <li v-for="route in routes" :key="route.url">
                            <a :href="route.url">
                                {{route.name | ucFirst}}
                            </a>
                        </li>
                        <li v-for="category in categories" :key="category.id">
                            <a :href="category.slug">
                                {{category.name | ucFirst}}
                            </a>
                        </li>
                    
                    </ul>
                </div>
       
        </div>
    </div>
</template>

<script>

import imageLogo from '../images/image-logo.vue';
import overlayMenu from './overlay-menu.vue'
import {mapGetters} from 'vuex';
export default {
    components : {
        imageLogo,
        overlayMenu
    },
    data(){
        return{
            showMenu : false,
            routes : [
            {url : '/',name : 'home'},
            {url : '/regalos-empresariales',name : 'Regalos empresariales'},
            {url : '/cotizador',name : 'Hace tu pedido'},
            {url : '/sucursales',name : 'Sucursales'},
            {url : '/contacto',name : 'Contacto'},
            {url : '/franquicia',name : 'Franquicia'},
        ]
                
            
     }
    },
    computed :{
        ...mapGetters({
            categories : 'categories/getCategories',

        }),
    },
    methods:{
        close(){
            this.$emit('close');
        }
    }
}
</script>

<style scoped lang="scss">

// violeta oscuro es b2037a
$color-first : #b2037a;

// El verde es 09cca2 
$color-second : #09cca2;

// Rosa fuerte es ff0aaf
$color-focus: #ff0aaf; 

// Rosa claro es ff97dd
$color-back: #ff97dd;



      #overlay{
        width: 100vw;
        height: 100vw;
        background-color: #aaaaaa55;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 50;
    }
    
  ul > li:nth-child(odd) {
  background: #fff;
}
  ul > li:nth-child(even) {
  background: darken( #fff, 10% );
}

ul li {
    font-size: 1rem;
    color : $color-first;
    font-weight: bold;
    border-bottom: 1px solid $color-first;
    padding-left: 15px;
    a {
        display: block;
    }
}

</style>