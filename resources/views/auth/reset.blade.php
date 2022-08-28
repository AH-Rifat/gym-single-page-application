@extends('layouts.authApp')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo"></span>
                    <span class="app-brand-text demo text-body fw-bolder">Gym Software</span>
                </a>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">
                <div class="mb-2">
                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email"
                        autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100 mb-3">Reset Password</button>

                <div class="text-center">
                    <a href="/login" class="d-flex align-items-center justify-content-center">
                        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                        Back to login
                    </a>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
