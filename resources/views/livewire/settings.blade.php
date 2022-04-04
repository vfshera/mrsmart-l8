<div class="mrsmart-container pt-20">
    <div class=" site-settings-page">

        {{-- @if ($showModal) --}}
        <div class="modal-wrapper" x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak>

            <div class="modal ">
                <div class="settings-modal">
                    <div class="modal-info">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 30 30">
                            <path
                                d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z" />
                        </svg>

                        <p>Save <strong>{{ ucwords(str_replace('_', ' ', $settingField)) }}</strong>?</p>
                    </div>

                    <div class="modal-action">
                        <button class="save" wire:click="save">Yes</button>
                        <button class="discard" wire:click="close">Discard</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}



        <h1>Site Settings </h1>

        <hr>

        <div class="settings" x-data="{ setting: @entangle('settingField'), settingValue: @entangle('settingValue') }">

            <div class="mono-settings">
                <div class="setting">
                    <p class="name">Name</p>
                    <p class="value">


                        <input x-show="setting === 'name'" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            type="text" wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                            placeholder="eg. MrSmart Cleaning Services">

                        <span x-show="setting != 'name'" x-cloak
                            x-transition:enter="transition ease-out duration-400 delay-150"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-0"
                            data-field=" Edit Site Name" wire:click="setField('name')">{{ $siteInfo->name }}</span>

                    </p>
                </div>

                <div class="setting">
                    <p class="name">Location</p>
                    <p class="value">


                        <input x-show="setting === 'location'" x-cloak
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            type="text" wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                            placeholder="eg. Mpeketoni, Lamu">

                        <span x-show="setting != 'location'" x-cloak
                            x-transition:enter="transition ease-out duration-400 delay-150"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-0"
                            data-field=" Edit Site Location"
                            wire:click="setField('location')">{{ $siteInfo->location }}</span>

                    </p>
                </div>

                <div class="setting">
                    <p class="name">Email</p>
                    <p class="value">


                        <input x-show="setting === 'email'" x-cloak
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            type="email" wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                            placeholder="eg. info@domain.com">

                        <span x-show="setting != 'email'" x-cloak
                            x-transition:enter="transition ease-out duration-400 delay-150"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-0"
                            data-field="Edit Site Email" wire:click="setField('email')">{{ $siteInfo->email }}</span>

                    </p>
                </div>

                <div class="setting">
                    <p class="name">Phone</p>
                    <p class="value">


                        <input x-show="setting === 'phone'" x-cloak
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            type="text" wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                            placeholder="eg. +2547XXXXXXXX">

                        <span x-show="setting != 'phone'" x-cloak
                            x-transition:enter="transition ease-out duration-400 delay-150"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-0"
                            data-field="Edit Site Phone" wire:click="setField('phone')">{{ $siteInfo->phone }}</span>

                    </p>
                </div>
            </div>


            <div class="group-settings">
                <div class="settings-group">
                    <h3>Operating Days</h3>
                    <div class="setting">
                        <p class="name">From</p>
                        <p class="value">


                            <input x-show="setting === 'operation_day_from'" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90" type="text"
                                wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                                placeholder="eg. Mon,Tue Wed ...">

                            <span x-show="setting != 'operation_day_from'" x-cloak
                                x-transition:enter="transition ease-out duration-400 delay-150"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-0" data-field="Edit Operation Day"
                                wire:click="setField('operation_day_from')">{{ $siteInfo->operation_day_from }}</span>

                        </p>
                    </div>
                    <div class="setting">
                        <p class="name">To</p>
                        <p class="value">

                            <input x-show="setting === 'operation_day_to'" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90" type="text"
                                wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                                placeholder="eg. Fri,Sat,Sun ...">

                            <span x-show="setting != 'operation_day_to'" x-cloak
                                x-transition:enter="transition ease-out duration-400 delay-150"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-0" data-field="Edit Operation Day"
                                wire:click="setField('operation_day_to')">{{ $siteInfo->operation_day_to }}</span>

                        </p>
                    </div>
                </div>

                <div class="settings-group">
                    <h3>Operating Hours</h3>
                    <div class="setting">
                        <p class="name">From</p>
                        <p class="value">

                            {{-- @if ($settingField === 'operation_time_from') --}}


                            <input x-show="setting === 'operation_time_from'" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90" type="text"
                                wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                                placeholder="eg. 6am,7am,8am ...">
                            {{-- @else --}}
                            <span x-show="setting != 'operation_time_from'" x-cloak
                                x-transition:enter="transition ease-out duration-400 delay-150"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-0" data-field="Edit Operation Time"
                                wire:click="setField('operation_time_from')">{{ $siteInfo->operation_time_from }}</span>
                        </p>
                    </div>
                    <div class="setting">
                        <p class="name">To</p>
                        <p class="value">
                            {{-- @if ($settingField === 'operation_time_to') --}}
                            <input x-show="setting === 'operation_time_to'" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90" type="text"
                                wire:model.debounce.500ms="settingValue" @click.away="$wire.checkValues()"
                                placeholder="eg. 3pm,4pm,5pm ...">
                            {{-- @else --}}
                            <span x-show="setting != 'operation_time_to'" x-cloak
                                x-transition:enter="transition ease-out duration-400 delay-150"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-0" data-field="Edit Operation Time"
                                wire:click="setField('operation_time_to')">{{ $siteInfo->operation_time_to }}</span>
                            {{-- @endif --}}
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
