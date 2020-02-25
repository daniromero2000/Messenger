@extends('layouts.app')

@section('content')
<b-container fluid>
    <b-row>
      <b-col cols="4"> 
             <b-form-input class="text-center" placeholder="Search..."></b-form-input>
             <b-row class="p-3" aling-h="center">
                <b-col cols="3" mb="3" class="text-center"> 
                    <b-img blank width="48" height="48" rounded="circle" blank-color="#777" class="mt-1" alt="Circle image"></b-img>
                </b-col>
                <b-col cols="6" aling-self="center" class="d-none d-md-block">
                    <p class="mb-1">Daniel Romero</p>
                    <p class="text-muted small mb-1"> Tù: Hata luego</p>
                </b-col>
                <b-col cols="3" class="d-none d-md-block">        
                    <p class="text-muted small">1: 37 pm</p>
                </b-col>
              </b-row>
              <b-row class="p-3" aling-h="center">
                <b-col cols="3" mb="3" class="text-center"> 
                    <b-img blank width="48" height="48" rounded="circle" blank-color="#777" class="mt-1" alt="Circle image"></b-img>
                </b-col>
                <b-col cols="6" aling-self="center" class="d-none d-md-block">
                    <p class="mb-1">Daniel Romero</p>
                    <p class="text-muted small mb-1"> Tù: Hata luego</p>
                </b-col>
                <b-col cols="3" class="d-none d-md-block">        
                    <p class="text-muted small">1: 36 pm</p>
                </b-col>
              </b-row>
              <b-row class="p-3" aling-h="center">
                <b-col cols="3" mb="3" class="text-center"> 
                    <b-img blank width="48" height="48" rounded="circle" blank-color="#777" class="mt-1" alt="Circle image"></b-img>
                </b-col>
                <b-col cols="6" aling-self="center" class="d-none d-md-block">
                    <p class="mb-1">Daniel Romero</p>
                    <p class="text-muted small mb-1"> Tù: Hata luego</p>
                </b-col>
                <b-col cols="3" class="d-none d-md-block">        
                    <p class="text-muted small">1: 35 pm</p>
                </b-col>
              </b-row>
      </b-col>
      <b-col cols="8">
        <b-row class="p-3" aling-h="center">            
            <b-col cols="8" aling-self="center" class="d-none d-md-block">
                <p class="mb-1">Daniel Romero</p>
                <p class="text-muted small mb-1"> Tù: Hata luego</p>
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
      </b-col>
    </b-row>
  </b-container>
@endsection
