@extends('auth.master')

@section('content')
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                            {{ __('Register') }}
                    </div>

                    <div class="card-body py-5">
                            <form method="POST" action="{{ route('register') }}">
                                    @csrf
                        <div class="form-group">
                            <label for="name" class="form-control-label">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                             @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-control-label">{{ __('E-Mail Address') }}</label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                             @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-control-label">{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                             @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" name class="form-control-label">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Create Account</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
