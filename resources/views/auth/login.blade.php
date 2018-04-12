@extends('backend.master-auth')

@section('content')
<div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="{{asset('img/logo.png')}}" class="h-6" alt="">
              </div>
             <form class="card" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body p-6">
                  <div class="card-title">{{ __('Login') }}</div>
                  <div class="form-group">
                    <label class="form-label">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email">
                    @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      {{ __('Password') }}                      
                    </label>
                     <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter your password" required>
                     @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">                       
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" />
                      <span class="custom-control-label">{{ __('Remember Me') }}</span>
                    </label>
                  </div>
                  <div class="form-footer">
                       <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>                   
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                <a href="{{ route('password.request') }}">I forgot my password</a>
              </div>
              <div class="text-center text-muted">
                Don't have account yet? <a href="{{route('register')}}">Sign up</a>
              </div>
            </div>
          </div>
        </div>

@endsection