<x-guest-layout>

    <x-slot name="title">
        Login | 
    </x-slot>
    
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <div class="input-field">
                    <input id="email" type="email" class="validate"  name="email" :value="old('email')" required autofocus >
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="input-field">
                    <input id="password" type="password" class="validate"  name="password" :value="old('password')" required autocomplete="current-password">
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="flex justify-between items-center mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
             
            </div>

            <div class="flex items-center my-6">
                <x-jet-button class="flex-grow bg-green-700 hover:bg-green-800 ">
                        {{ __('Sign in') }}
                </x-jet-button>
            </div>
        </form>


        <p class="text-seperator"><span>OR</span></p>

        <div class="flex ">
            <a class="flex-grow oauth-container btn darken-4 bg-red-500 hover:bg-red-400 white-text" href="/signin-google" style="text-transform:none">
                <div class="left">
                    {{ __('Sign in with Google') }}
                </div>

                <div class="right">
                    <img width="23px" class="ml-4 mt-2" alt="Google sign-in" 
                        src="{{ asset('images/logo/google-logo.png') }}" />
                </div>
            </a>
        </div>

        <div class="flex my-4">
            <a class="flex-grow oauth-container btn darken-4 bg-blue-500 hover:bg-blue-400 white-text" href="/signin-facebook" style="text-transform:none">
                <div class="left">
                    {{ __('Sign in with Facebook') }}
                </div>
                <div class="right">
                    <img width="23px" class="ml-4 mt-2" alt="facebook sign-in" 
                        src="{{ asset('images/logo/fb-logo.png') }}" />
                </div>
            </a>
        </div>

        <div class="right mt-2">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __("Don't have a account? Sign up here.") }}
            </a>
        </div>
    
    </x-jet-authentication-card>

    

 
</x-guest-layout>
