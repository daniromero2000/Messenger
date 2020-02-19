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
                    id="input-group-1"
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

                    {{-- <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                           
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </b-form>
              
            </b-card>
        </b-col> 
    </b-row>
</b-container>
@endsection
