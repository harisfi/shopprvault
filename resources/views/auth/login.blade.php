@auth
    <script>
        alert('You are already logged in')
        window.location = "{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : url('/')}}"
    </script>
@endauth
<!DOCTYPE html>
<html lang="en">

<head>
    @push('title', 'Login')
    @include('admin.partials.head')
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>
                            <form method="POST" class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}" required>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="{{ old('password') }}" required>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('redir_data'))
        <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
            <div class="toast hide align-items-center text-white border-0 @if (session('redir_data')['error']) bg-danger @else bg-success @endif" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('redir_data')['message'] }}
                    </div>
                    <button type="button" class="mr-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @if (session('redir_data'))
        <script>
            $('.toast').toast('show')
        </script>
    @endif
</body>

</html>