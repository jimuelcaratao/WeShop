<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                {{-- <x-jet-label for="name" value="{{ __('Full Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> --}}

                <div class="input-field">
                    <input id="name" type="text" class="validate"  name="name" :value="old('name')" required autofocus autocomplete="name" >
                    <label for="name">{{ __('Full Name') }}</label>
                </div>
            </div>

            <div class="mt-4">
                {{-- <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required /> --}}

                <div class="input-field">
                    <input id="email" type="email" class="validate"  name="email" :value="old('email')" required >
                    <label for="email">{{ __('Email') }}</label>
                </div>
            </div>

            <div class="mt-4">
                {{-- <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" /> --}}


                <div class="input-field">
                    <input id="password" type="password" class="validate"  name="password"  required autocomplete="new-password">
                    <label for="password">{{ __('Password') }}</label>
                </div>
            </div>

            <div class="mt-4">
                {{-- <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" /> --}}

                <div class="input-field">
                    <input id="password_confirmation" type="password" class="validate"  name="password_confirmation"  required autocomplete="new-password">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                {{-- <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div> --}}


                
                <div class="flex justify-between items-center mt-4">
                    <label for="terms" class="flex items-center">
                        <x-jet-checkbox id="terms" name="terms" />
                        <span class="ml-2 text-sm text-gray-600">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </span>
                    </label>

                
                </div>
            @endif

            <div class="flex items-center my-6">
                <x-jet-button class="flex-grow bg-green-700 hover:bg-green-800 ">
                    {{ __('Sign Up') }}
                </x-jet-button>
            </div>

        

        </form>

        <p class="text-seperator"><span>OR</span></p>


        <div class="flex ">
            <a class="flex-grow oauth-container btn darken-4 bg-red-500 hover:bg-red-400 white-text" href="/signin-google" style="text-transform:none">
                <div class="left">
                    {{ __('Sign up with Google') }}
                </div>

                <div class="right">
                    <img width="23px" class="ml-4 mt-2" alt="Google sign-in" 
                        {{-- src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" /> --}}
                        src="https://www.pikpng.com/pngl/b/44-442110_jpg-black-and-white-library-google-logo-png.png" />

                </div>
            </a>
        </div>

        <div class="flex my-4">
            <a class="flex-grow oauth-container btn darken-4 bg-blue-500 hover:bg-blue-400 white-text" href="/signin-facebook" style="text-transform:none">
                <div class="left">
                    {{ __('Sign up with Facebook') }}
                </div>
                <div class="right">
                    <img width="23px" class="ml-4 mt-2" alt="facebook sign-in" 
                        {{-- src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" /> --}}
                        src="{{ asset('images/logo/fb-logo.png') }}" />
                </div>
            </a>
        </div>

        <div class="right mt-2">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __("Already registered?") }}
            </a>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
