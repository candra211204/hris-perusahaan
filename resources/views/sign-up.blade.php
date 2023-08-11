@extends('template.auth')

@section('title', 'Sign Up')

@section('content')
    <form class="card card-md" action="{{ route('sign.up.action') }}" method="POST" >
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Buat akun baru</h2>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                    name="name" placeholder="ex : Nama lengkap" maxlength="50" autofocus required>
                @error('name')
                    <span class="text-danger mt-4">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    name="email" placeholder="ex : example@gmail.com" required>
                @error('email')
                    <span class="text-danger mt-4">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control" name="password"
                        id="sign-up-password" placeholder="Password" minlength="8" required>
                    <span class="input-group-text">
                        <a href="" class="link-secondary" title="Lihat password" data-bs-toggle="tooltip"
                            id="sign-up-show-password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path
                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        </a>
                    </span>
                </div>
                <span class="text-danger mt-4 d-none" id="sign-up-password-alert">The password field must be at least 8 characters.</span>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Buat akun baru</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        Sudah punya akun? <a href="{{ url('/sign-in') }}" tabindex="-1">Sign in</a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#sign-up-show-password').click(function(e) {
                e.preventDefault();

                let pass = $("#sign-up-password");

                if (pass.attr('type') === 'password') {
                    pass.attr('type', 'text');
                } else {
                    pass.attr('type', 'password');
                }
            });

            $('#sign-up-password').on('input', function() {
                let pass = $('#sign-up-password');
                let passAlert = $('#sign-up-password-alert');
                let passVal = pass.val();

                if (passVal.length < 8 && passVal.length > 0) {
                    $(passAlert).removeClass('d-none');
                    $(pass).addClass('is-invalid'); 
                } else if (passVal.length >= 8) {
                    $(passAlert).addClass('d-none');
                    $(pass).removeClass('is-invalid'); 
                    $(pass).addClass('is-valid'); 
                } else {
                    $(passAlert).addClass('d-none');
                    $(pass).removeClass('is-invalid'); 
                    $(pass).removeClass('is-valid'); 
                }
            });
        });
    </script>
@endsection
