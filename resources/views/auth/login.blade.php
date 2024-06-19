<x-layouts.guest page-title="Login" card-title="Accedi al tuo account">
    <div x-data="{ loading: false }">

        <form
            id="login-form" action="{{ route('login') }}" method="post" class="flex flex-col gap-y-2"
            x-on:submit="loading = true"
        >
            @csrf
            <x-input
                class="input-sm" type="email" name="email" placeholder="Email" label="Email" icon="o-envelope"
            />
            <x-input
                class="input-sm" type="password" name="password" placeholder="Password" label="Password" icon="o-eye"
            />
            <div class="flex justify-between items-center">
                <x-checkbox class="checkbox-sm" label="Ricordati" name="remember" value="1"/>
                <a href="{{ route('password.request') }}" wire:navigate.hover class="text-sm hover:underline">
                    Password dimenticata?
                </a>
            </div>
        </form>
        @foreach($errors->all() as $message)
            <div class="text-error flex items-center gap-1 my-5">
                <span>{{ $message }}</span>
            </div>
        @endforeach
        <div class="my-5">
            <x-button
                form="login-form" type="submit" class="btn-primary btn-sm w-full relative"
                x-bind:disabled="loading"
            >
                <x-loading class="loading-sm absolute left-5" x-show="loading"/>
                Login
            </x-button>
            <div class="text-center mt-5">
                <a href="{{ route('register') }}" class="text-xs hover:underline" wire:navigate.hover>
                    Non ho un account, voglio registrarmi.
                </a>
            </div>
        </div>
    </div>
</x-layouts.guest>

