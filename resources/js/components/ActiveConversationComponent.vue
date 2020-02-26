<template>
 <b-row class="pt-0 h-100" aling-h="center">            
    <b-col cols="8" aling-self="center" class="d-none d-md-block">
           <b-card class="h-100 border-0 mt-1" header-tag="header" footer-tag="footer">
               <b-media class="mb-3" right-align vertical-align="center">
                    <template v-slot:aside>
                    <b-img blank width="48" height="48" rounded="circle" blank-color="#777" class="mt-1" alt="Circle image"></b-img>
                    </template>
                    <b-card>
                    <p class="mb-0">
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                    </b-card>
                </b-media>
                  <b-media class="mb-3" vertical-align="center">
                    <template v-slot:aside>
                    <b-img blank width="48" height="48" rounded="circle" blank-color="#777" class="mt-1" alt="Circle image"></b-img>
                    </template>
                    <b-card>
                    <p class="mb-0">
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                    </b-card>
                </b-media>
                <template v-slot:footer>
                    <b-form>
                        <b-input-group>
                            <b-form-input class="text-center" placeholder="Search...">
                            </b-form-input>
                            <b-input-group-append>
                            <b-button size="sm" text="Button" variant="info">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </template>
            </b-card>
    </b-col>
    <b-col cols="4" class="d-none d-md-block">        
        <b-img blank width="48" height="48" rounded="circle" blank-color="#777" class="mt-1" alt="Circle image"></b-img>
        <p>Usuario</p>
        <hr>
        <b-form-checkbox
            >
            Desactivar Notificaciònes
        </b-form-checkbox>
    </b-col>
</b-row>
 </template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
