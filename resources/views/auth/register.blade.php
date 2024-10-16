<x-guest-layout>
    <style>
        /* Custom styles for registration page */
        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            position: relative;
        }

        /* Background image styling */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url('/images/62394d753859943e6a1a36443ef78795.gif') no-repeat center center;
            background-size: cover;
            z-index: 0;
            opacity: 1;
            filter: none;
        }

        .register-header {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #374151;
        }

        .register-button, .google-button {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1.5rem;
            transition: background-color 0.2s ease-in-out;
        }

        .register-button {
            background-color: #4f46e5;
            color: white;
        }

        .register-button:hover {
            background-color: #4338ca;
        }

        .google-button {
            background-color: #4285f4;
            color: white;
        }

        .google-button:hover {
            background-color: #357ae8;
        }

        .google-icon {
            margin-right: 8px;
            width: 100px;
            height: 50px;
        }

        .login-link {
            font-size: 0.875rem;
            color: #6b7280;
            text-align: right;
            margin-top: 1rem;
            display: inline-block;
        }

        .login-link:hover {
            color: #374151;
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .form-group label {
            font-size: 0.875rem;
            color: #4b5563;
        }

        .form-group input {
            margin-top: 0.5rem;
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid #d1d5db;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.3);
        }

        /* Password view icon */
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 38px;
            cursor: pointer;
            color: #6b7280;
        }

        .password-toggle:hover {
            color: #374151;
        }

    </style>

    <div class="background-image"></div> <!-- Optional background image for liveliness -->

    <div class="register-container">
        <h2 class="register-header">Create Your Account</h2>

        <form id="register-form" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <span class="password-toggle" onclick="togglePassword('password')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="login-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="register-button ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Google Register Button -->
        <a href="{{ route('auth.google') }}" class="google-button">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/Logo_2013_Google.png" class="google-icon" alt="Google Icon">
            {{ __('Register with Google') }}
        </a>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        }

        document.getElementById('register-form').addEventListener('submit', function() {
            document.getElementById('loader').style.display = 'flex'; // Show the loader
        });
    </script>
</x-guest-layout>
