<div wire:poll="updateUnreadNotificationsCount">
    <div>
        <x-button icon="o-bell" class="btn-ghost btn-sm relative hover:bg-inherit" wire:click="$toggle('drawer')">
            @if ($unreadNotificationsCount)
                <x-badge
                    class="absolute badge-primary -top-2 -right-2" :value="$unreadNotificationsCount"
                />
            @endif
        </x-button>
    </div>
    <x-drawer wire:model="drawer" class="w-11/12 md:w-1/2 lg:w-1/3 xl:w-1/4" right>
        <x-icon
            class="opacity-50 hover:opacity-75 absolute right-8 cursor-pointer w-6 h-6" wire:click="$toggle('drawer')"
            name="o-x-mark"
        />
        <div class="my-2">
            @if ($this->notifications->isNotEmpty())
                <div class="font-semibold mb-2">
                    <span>Notifiche</span>
                    <sup>
                        <x-badge class="badge-primary badge-sm" :value="$unreadNotificationsCount"/>
                    </sup>
                </div>
                <div class="flex items-center gap-4 font-bold text-sm mb-8">
                    @if ($unreadNotificationsCount)
                        <span
                            class="text-warning cursor-pointer hover:underline inline-flex items-center gap-2"
                            wire:click="markAllAsRead"
                        >
                            <x-loading class="loader-xs" wire:loading.delay.longer wire:target="markAllAsRead"/>
                            Segna tutte come lette
                        </span>
                    @endif
                    <span
                        class="text-error cursor-pointer hover:underline inline-flex items-center gap-2"
                        wire:click="deleteAll"
                    >Pulisci</span>
                </div>
                @foreach($this->notifications as $notification)
                    <div @class([
                        'flex flex-col gap-1 text-sm py-5 border-t -mx-8 px-8 border-s-8 border-s-transparent',
                        '!border-s-primary' => !$notification->read_at,
                    ])>
                        <x-icon
                            class="opacity-50 hover:opacity-75 absolute right-5 cursor-pointer w-5 h-5"
                            wire:click="delete('{{ $notification->id }}')"
                            name="o-x-mark"
                        />
                        <div class="font-semibold">{{ $notification->data['type'] }}</div>
                        <div class="text-base-content/75">{{ $notification->created_at->diffForHumans() }}</div>
                        <div class="text-base-content/75">{{ $notification->data['message'] }}</div>
                        <div
                            class="text-primary font-bold cursor-pointer hover:underline mt-2 flex items-center gap-2"
                            wire:click="markAsRead('{{ $notification->id }}')"
                        >
                            <x-loading
                                class="loader-xs" wire:loading.delay.long
                                wire:target="markAsRead('{{ $notification->id }}')"
                            />
                            Visualizza
                        </div>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center mb-5">
                    <x-icon
                        name="o-bell-slash" class="w-12 h-12 mx-auto text-base-content/75 bg-base-200 p-3 rounded-full "
                    />
                </div>
                <div class="text-center space-y-1">
                    <div class="font-semibold">Nessuna Notifica</div>
                    <div class="text-base-content/75 text-sm">Per favore controlla di nuovo più tardi.</div>
                </div>
            @endif
        </div>
    </x-drawer>
</div>
