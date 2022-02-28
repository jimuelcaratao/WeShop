<div>
    @if (!empty($user->cardname))
        <x-jet-form-section submit="updateProfileCard({{ $user->user_card_id }})">
            <x-slot name="title">
                {{ __('Profile Card') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile card.') }}
            </x-slot>

            <x-slot name="form">

                <!-- Card Name. -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="cardname" value="{{ __('Card Name.') }}" />
                    <x-jet-input id="cardname" type="text" class="mt-1 block w-full" wire:model.defer="cardname"
                        autocomplete="cardname" placeholder="{{ optional($user)->cardname }}"
                        value="{{ optional($user)->cardname }}" />
                    <x-jet-input-error for="cardname" class="mt-2" />
                </div>

                <!-- cardnumber -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="cardnumber" value="{{ __('Card Number') }}" />
                    <x-jet-input id="cardnumber" type="text" class="mt-1 block w-full" wire:model.defer="cardnumber"
                        autocomplete="cardnumber" placeholder="{{ optional($user)->cardnumber }}" />
                    <x-jet-input-error for="cardnumber" class="mt-2" />
                </div>

                <!-- expmonth -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="expmonth" value="{{ __('Exp Nonth') }}" />
                    <x-jet-input id="expmonth" type="text" class="mt-1 block w-full" wire:model.defer="expmonth"
                        autocomplete="expmonth" placeholder="{{ optional($user)->expmonth }}" />
                    <x-jet-input-error for="expmonth" class="mt-2" />
                </div>

                <!-- expyear -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="expyear" value="{{ __('Exp Year') }}" />
                    <x-jet-input id="expyear" type="text" class="mt-1 block w-full" wire:model.defer="expyear"
                        autocomplete="expyear" placeholder="{{ optional($user)->expyear }}" />
                    <x-jet-input-error for="expyear" class="mt-2" />
                </div>

                <!-- ccv -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="ccv" value="{{ __('CCV') }}" />
                    <x-jet-input id="ccv" type="text" class="mt-1 block w-full" wire:model.defer="ccv"
                        autocomplete="ccv" placeholder="{{ optional($user)->ccv }}" />
                    <x-jet-input-error for="ccv" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="cardname">
                    {{ __('Update') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    @else
        <x-jet-form-section submit="createProfileCard">
            <x-slot name="title">
                {{ __('Profile Card') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile card.') }}
            </x-slot>

            <x-slot name="form">

                <!-- Card Name. -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="cardname" value="{{ __('Card Name.') }}" />
                    <x-jet-input id="cardname" type="text" class="mt-1 block w-full" wire:model.defer="cardname"
                        autocomplete="cardname" placeholder="{{ optional($user)->cardname }}"
                        value="{{ optional($user)->cardname }}" />
                    <x-jet-input-error for="cardname" class="mt-2" />
                </div>

                <!-- cardnumber -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="cardnumber" value="{{ __('Card number') }}" />
                    <x-jet-input id="cardnumber" type="text" class="mt-1 block w-full" wire:model.defer="cardnumber"
                        autocomplete="cardnumber" placeholder="{{ optional($user)->cardnumber }}" />
                    <x-jet-input-error for="cardnumber" class="mt-2" />
                </div>

                <!-- expmonth -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="expmonth" value="{{ __('Exp Month') }}" />
                    <x-jet-input id="expmonth" type="text" class="mt-1 block w-full" wire:model.defer="expmonth"
                        autocomplete="expmonth" placeholder="{{ optional($user)->expmonth }}" />
                    <x-jet-input-error for="expmonth" class="mt-2" />
                </div>

                <!-- expyear -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="expyear" value="{{ __('Exp Year') }}" />
                    <x-jet-input id="expyear" type="text" class="mt-1 block w-full" wire:model.defer="expyear"
                        autocomplete="expyear" placeholder="{{ optional($user)->expyear }}" />
                    <x-jet-input-error for="expyear" class="mt-2" />
                </div>

                <!-- ccv -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="ccv" value="{{ __('CCV') }}" />
                    <x-jet-input id="ccv" type="text" class="mt-1 block w-full" wire:model.defer="ccv"
                        autocomplete="ccv" placeholder="{{ optional($user)->ccv }}" />
                    <x-jet-input-error for="ccv" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="cardname">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    @endif

</div>
