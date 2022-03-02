<div>
    @if (!empty($user->mobile_no))
        <x-jet-form-section submit="updateProfileAddress({{ $user->user_address_id }})">
            <x-slot name="title">
                {{ __('Profile Address') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile address.') }}
            </x-slot>

            <x-slot name="form">

                <!-- Mobile No. -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="mobile_no" value="{{ __('Mobile No.') }}" />
                    <x-jet-input id="mobile_no" type="text" class="mt-1 block w-full" wire:model.defer="mobile_no"
                        autocomplete="mobile_no" placeholder="{{ optional($user)->mobile_no }}"
                        value="{{ optional($user)->mobile_no }}" />
                    <x-jet-input-error for="mobile_no" class="mt-2" />
                </div>

                <!-- House -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="house" value="{{ __('House') }}" />
                    <x-jet-input id="house" type="text" class="mt-1 block w-full" wire:model.defer="house"
                        autocomplete="house" placeholder="{{ optional($user)->house }}" />
                    <x-jet-input-error for="house" class="mt-2" />
                </div>

                <!-- City -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="city"
                        autocomplete="city" placeholder="{{ optional($user)->city }}" />
                    <x-jet-input-error for="city" class="mt-2" />
                </div>

                <!-- Barangay -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="barangay" value="{{ __('Barangay') }}" />
                    <x-jet-input id="barangay" type="text" class="mt-1 block w-full" wire:model.defer="barangay"
                        autocomplete="barangay" placeholder="{{ optional($user)->barangay }}" />
                    <x-jet-input-error for="barangay" class="mt-2" />
                </div>

                <!-- Province -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="province" value="{{ __('Nearest Landmark') }}" />
                    <x-jet-input id="province" type="text" class="mt-1 block w-full" wire:model.defer="province"
                        autocomplete="province" placeholder="{{ optional($user)->province }}" />
                    <x-jet-input-error for="province" class="mt-2" />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="mobile_no">
                    {{ __('Update') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    @else
        <x-jet-form-section submit="createProfileAddress">
            <x-slot name="title">
                {{ __('Profile Address') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile address.') }}
            </x-slot>

            <x-slot name="form">

                <!-- Mobile No. -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="mobile_no" value="{{ __('Mobile No.') }}" />
                    <x-jet-input id="mobile_no" type="text" class="mt-1 block w-full" wire:model.defer="mobile_no"
                        autocomplete="mobile_no" placeholder="{{ optional($user)->mobile_no }}"
                        value="{{ optional($user)->mobile_no }}" />
                    <x-jet-input-error for="mobile_no" class="mt-2" />
                </div>

                <!-- House -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="house" value="{{ __('House') }}" />
                    <x-jet-input id="house" type="text" class="mt-1 block w-full" wire:model.defer="house"
                        autocomplete="house" placeholder="{{ optional($user)->house }}" />
                    <x-jet-input-error for="house" class="mt-2" />
                </div>

                <!-- City -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="city"
                        autocomplete="city" placeholder="{{ optional($user)->city }}" />
                    <x-jet-input-error for="city" class="mt-2" />
                </div>

                <!-- Barangay -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="barangay" value="{{ __('Barangay') }}" />
                    <x-jet-input id="barangay" type="text" class="mt-1 block w-full" wire:model.defer="barangay"
                        autocomplete="barangay" placeholder="{{ optional($user)->barangay }}" />
                    <x-jet-input-error for="barangay" class="mt-2" />
                </div>

                <!-- Province -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="province" value="{{ __('Nearest Landmark') }}" />
                    <x-jet-input id="province" type="text" class="mt-1 block w-full" wire:model.defer="province"
                        autocomplete="province" placeholder="{{ optional($user)->province }}" />
                    <x-jet-input-error for="province" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="mobile_no">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    @endif

</div>
