@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                          
                                <input hidden id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus value="{{ __('a94a8fe5ccb19ba61c4c0873d391e987982fbbd3') }}">


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      
                                <input hidden id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ __('a94a8fe5ccb19ba61c4c0873d391e987982fbbd3') }}" required autocomplete="new-password">

                                <input hidden id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{ __('a94a8fe5ccb19ba61c4c0873d391e987982fbbd3') }}">
                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }} Como Eleitor.
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
