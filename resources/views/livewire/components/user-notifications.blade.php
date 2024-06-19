<div>
    <x-dropdown>
        <x-slot:trigger>
            <div wire:poll="updateUnreadNotificationsCount">
                <x-button icon="o-bell" class="btn-ghost btn-sm relative">
                    <span class="hidden lg:inline">Notifiche</span>
                    @if ($unreadNotificationsCount)
                        <x-badge class="absolute badge-primary -top-2 -right-2" :value="$unreadNotificationsCount"/>
                    @endif
                </x-button>
            </div>
        </x-slot:trigger>

        @forelse($this->notifications as $notification)
            <div
                @class([
    'select-none py-1 px-5 hover:bg-base-content/10 min-w-[20rem] cursor-pointer',
    'text-base-content/50' => $notification->read_at,
    ])
                wire:click.stop="markAsRead('{{ $notification->id }}')"
            >
                <h5 class="font-bold">{{ $notification->data['message'] }}</h5>
                <div class="text-xs">
                    <div>{{ $notification->data['type'] }}</div>
                    <div>{{ $notification->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @unless($loop->last)
                <hr class="border-t border-base-content/20">
            @endunless
        @empty
            <div class="text-base-content/50 select-none py-2 px-5">Nessuna notifica</div>
        @endforelse


    </x-dropdown>
</div>
