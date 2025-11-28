<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - IndoWhatCRM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-wa-light-gray min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center gap-2">
                <div class="w-12 h-12 bg-wa-primary rounded-xl flex items-center justify-center">
                    <i class="fa-brands fa-whatsapp text-white text-2xl"></i>
                </div>
                <span class="text-2xl font-bold text-wa-secondary">IndoWhatCRM</span>
            </a>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-wa-dark mb-2">Selamat Datang Kembali</h1>
                <p class="text-wa-gray">Masuk ke akun Anda untuk melanjutkan</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 text-red-600 text-sm">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-center gap-2 text-green-600 text-sm">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-wa-dark mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-wa-gray"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required 
                            autofocus
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent transition-all placeholder:text-wa-gray/50"
                            placeholder="nama@email.com"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-wa-dark mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-wa-gray"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full pl-11 pr-12 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent transition-all placeholder:text-wa-gray/50"
                            placeholder="••••••••"
                        >
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-wa-gray hover:text-wa-dark transition-colors">
                            <i id="eyeIcon" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-wa-primary focus:ring-wa-primary">
                        <span class="text-sm text-wa-gray">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-wa-primary hover:text-wa-primary-dark transition-colors">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full py-3 bg-wa-primary hover:bg-wa-primary-dark text-white font-semibold rounded-xl transition-all hover:shadow-lg hover:shadow-wa-primary/25 flex items-center justify-center gap-2">
                    <span>Masuk</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-wa-gray">atau</span>
                </div>
            </div>

            <!-- Social Login -->
            <div class="space-y-3">
                <button type="button" class="w-full py-3 bg-white border border-gray-200 text-wa-dark font-medium rounded-xl hover:bg-gray-50 transition-all flex items-center justify-center gap-3">
                    <i class="fa-brands fa-google text-lg"></i>
                    <span>Masuk dengan Google</span>
                </button>
            </div>

            <!-- Register Link -->
            <p class="text-center mt-8 text-wa-gray">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-wa-primary hover:text-wa-primary-dark font-medium transition-colors">
                    Daftar Gratis
                </a>
            </p>
        </div>

        <!-- Demo Credentials -->
        <div class="mt-6 p-4 bg-wa-secondary/10 rounded-xl border border-wa-secondary/20">
            <div class="flex items-start gap-3">
                <i class="fa-solid fa-circle-info text-wa-secondary mt-0.5"></i>
                <div class="text-sm">
                    <p class="font-medium text-wa-secondary mb-1">Demo Account</p>
                    <p class="text-wa-gray">Email: <span class="font-mono">demo@indowhatcrm.com</span></p>
                    <p class="text-wa-gray">Password: <span class="font-mono">password</span></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>

