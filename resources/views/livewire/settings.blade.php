<x-admin-layout>
    <div class="mrsmart-container">
        <div class=" site-settings-page">

            <h1>Site Settings </h1>

            <hr>

            <div class="settings">

                <div class="mono-settings">
                    <div class="setting">
                        <p class="name">Name</p>
                        <p class="value">{{ $siteInfo->name }}</p>
                    </div>

                    <div class="setting">
                        <p class="name">Location</p>
                        <p class="value">{{ $siteInfo->location }}</p>
                    </div>

                    <div class="setting">
                        <p class="name">Email</p>
                        <p class="value">{{ $siteInfo->email }}</p>
                    </div>

                    <div class="setting">
                        <p class="name">Phone</p>
                        <p class="value">{{ $siteInfo->phone }}</p>
                    </div>
                </div>


                <div class="group-settings">
                    <div class="settings-group">
                        <h3>Operating Days</h3>
                        <div class="setting">
                            <p class="name">From</p>
                            <p class="value">{{ $siteInfo->operation_day_from }}</p>
                        </div>
                        <div class="setting">
                            <p class="name">To</p>
                            <p class="value">{{ $siteInfo->operation_day_to }}</p>
                        </div>
                    </div>

                    <div class="settings-group">
                        <h3>Operating Hours</h3>
                        <div class="setting">
                            <p class="name">From</p>
                            <p class="value">

                                @if ($settingField === 'operation_time_from')
                                    <input type="text" wire:model.debounce.500ms="settingValue"
                                        value="{{ $siteInfo->operation_time_from }}">
                                @else
                                    <span data-field="Edit Operation Time"
                                        wire:click="setField('operation_time_from')">{{ $siteInfo->operation_time_from }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="setting">
                            <p class="name">To</p>
                            <p class="value">
                                @if ($settingField === 'operation_time_to')
                                    <input type="text" wire:model.debounce.500ms="settingValue"
                                        value="{{ $siteInfo->operation_time_to }}">
                                @else
                                    <span data-field="Edit Operation Time"
                                        wire:click="setField('operation_time_to')">{{ $siteInfo->operation_time_to }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-admin-layout>
