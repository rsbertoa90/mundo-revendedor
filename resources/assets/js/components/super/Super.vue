<template>
    
    <div class="row">
        <div class="col-12">
            <hr>
            <super-categories></super-categories>
            <hr>
        </div>
        <div class="col-12 mt-4">
            <hr>
            <super-metadata></super-metadata>
            <hr>
        </div>
        
    </div>
</template>

<script>
import superCategories from './categories.vue';
import superMetadata from './metadata.vue'
export default {
    components : {
        superCategories,
        superMetadata
    },
    data(){
        return{
            
        }
    }

}
</script>
