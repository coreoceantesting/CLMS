@extends('Layouts.common')

@section('content')
    <!-- Content -->

        <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                <a href="{{url('/')}}" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                    </span>
                    <span class="app-brand-text demo text-body fw-bolder"><img src="{{ asset('/assets/img/avatars/TMC.jpg') }}" width="150px" alt="Left Logo"></span>
                </a>
                </div>
                <!-- /Logo -->
                {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
                <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        autofocus
                        />
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        {{-- <a href="auth-forgot-password-basic.html">
                            <small>Forgot Password?</small>
                        </a> --}}
                        </div>
                        <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                    {{-- <div class="mb-3">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                    </div>
                </form>

                <p class="text-center" style="display: none">
                    <span>New on our platform?</span>
                    <a href="{{route('register')}}">
                        <span>Create an account</span>
                    </a>
                </p>
            </div>
            </div>
            <!-- /Register -->
        </div>
        </div>
  
    <!-- / Content -->
@endsection

@push('js')
@endpush
