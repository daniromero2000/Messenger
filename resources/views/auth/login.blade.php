@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
                    
            <b-card  header-tag="header" footer-tag="footer">
                <template v-slot:header>
                <h6 class="mb-0">{{ __('Login') }}</h6>
                </template>
                <b-alert show>Default Alert</b-alert>

                <b-form method="POST" action="{{ route('login') }}">
                    @csrf

                    <b-form-group
                    label="Email address:"
                    label-for="email"
                  >
                    <b-form-input
                      class="form-control @error('email') is-invalid @enderror"
                      id="email"
                      type="email"
                      required
                      placeholder="Enter email"
                    ></b-form-input>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </b-form-group>
            
                  <b-form-group id="password" label="{{ __('Password') }}" label-for="password">
                    <b-form-input
                      class="form-control @error('password') is-invalid @enderror"
                      id="password" type="password"
                      required
                      name="password" required autocomplete="current-password"
                      placeholder="Enter name"
                    ></b-form-input>
                    
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </b-form-group>
                  
                    <b-form-group >
                     <b-button type="submit" variant="primary">
                        {{ __('Login') }}
                     </b-button>

                     @if (Route::has('password.request'))
                    <b-button  href="{{ route('password.request') }}" variant="link">
                        {{ __('Forgot Your Password?') }}
                    </b-button>
                     @endif
                      </b-form-group>

             </b-form>
              
            </b-card>
        </b-col> 
    </b-row>
</b-container>
@endsection
