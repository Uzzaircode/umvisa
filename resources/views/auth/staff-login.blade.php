@extends('backend.master-auth')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-login mx-auto">
            <div class="text-center mb-6">
                <!-- <img src="{{asset('img/logo.png')}}" class="h-8" alt=""> -->
            </div>
            <form class="card" method="POST" action="{{ route('staff.login.submit') }}">
                @csrf
                <div class="card-body p-6">
                    <div class="card-title">{{ __('Login') }}</div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Staff No.') }}</label>
                        <input type="text" class="form-control{{ $errors->has('STA_NOSTAF') ? ' is-invalid' : '' }}" name="STA_NOSTAF"
                            value="{{ old('STA_NOSTAF') }}" placeholder="Enter Staff No."> @if ($errors->has('STA_NOSTAF'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('STA_NOSTAF') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            {{ __('Password') }}
                        </label>
                        <input id="STA_KATA_LALUAN" type="password" class="form-control{{ $errors->has('STA_KATA_LALUAN') ? ' is-invalid' : '' }}"
                            name="STA_KATA_LALUAN" placeholder="Enter your password" required> @if ($errors->has('STA_KATA_LALUAN'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('STA_KATA_LALUAN') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }} class="custom-control-input" />
                            <span class="custom-control-label">{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    {{-- <div id="" class="form-footer text-center">
                        <ul class="social-links list-inline mb-0 mt-2">
                            <li class="list-inline-item"><a href="/login/github">
                                    <i class="fa fa-github fa-2x"></i>
                                </a></li>
                            <li class="list-inline-item"><a href="/login/github">
                                    <i class="fa fa-facebook-official fa-2x"></i>
                                </a></li>
                            <li class="list-inline-item"><a href="/login/github">
                                    <i class="fa fa-youtube fa-2x"></i>
                                </a></li>
                        </ul>
                    </div> --}}
                </div>
            </form>

            <div class="text-center text-muted">
                <a href="{{ route('password.request') }}" style="color:antiquewhite">I forgot my password</a>
            </div>
            {{-- <div class="text-center text-muted">
                Don't have account yet?
                <a href="{{route('register')}}">Sign up</a>
            </div> --}}
        </div>
    </div>
</div>

@endsection