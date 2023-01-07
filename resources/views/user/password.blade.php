@extends('app')
@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1"><b>Home App</b><sub>Arnon</sub></a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <p class="alert alert-success text-center">{{ session('success') }}</p>
                @endif
                @if (session('failed'))
                    <p class="alert alert-danger text-center">{{ session('failed') }}</p>
                @endif
                <form method="POST" action="{{ route('password.action') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                            name="old_password" placeholder="Password Lama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('old_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            name="new_password" placeholder="Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                            name="new_password_confirmation" placeholder="Konfirmasi Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('new_password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
