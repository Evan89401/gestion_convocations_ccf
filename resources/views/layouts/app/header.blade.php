<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-white dark:bg-zinc-800">

        <flux:header
            container
            class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
        >

            <flux:sidebar.toggle
                class="lg:hidden mr-2"
                icon="bars-2"
                inset="left"
            />

            <a
                href="{{ route('menu') }}"
                class="font-semibold text-zinc-900 dark:text-white"
                wire:navigate
            >
                Convocations CCF
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">

                <flux:navbar.item
                    icon="home"
                    :href="route('menu')"
                    :current="request()->routeIs('menu')"
                    wire:navigate
                >
                    Accueil
                </flux:navbar.item>

                @if(auth()->user()->hasRole('ADMIN'))

                    <flux:navbar.item
                        icon="users"
                        :href="route('utilisateurs.index')"
                        :current="request()->routeIs('utilisateurs.*')"
                        wire:navigate
                    >
                        Utilisateurs
                    </flux:navbar.item>

                    <flux:navbar.item
                        icon="cog-6-tooth"
                        :href="route('parametrage.index')"
                        :current="request()->routeIs('parametrage.*')"
                        wire:navigate
                    >
                        Paramétrage
                    </flux:navbar.item>

                @endif

                @if(auth()->user()->hasRole('GEST'))

                    <flux:navbar.item
                        icon="academic-cap"
                        :href="route('epreuves.index')"
                        :current="request()->routeIs('epreuves.*')"
                        wire:navigate
                    >
                        Épreuves
                    </flux:navbar.item>

                @endif

                @if(
                    auth()->user()->hasRole('JURY_ENS')
                    || auth()->user()->hasRole('JURY_PRO')
                )

                    <flux:navbar.item
                        icon="calendar-days"
                        :href="route('jury.planning')"
                        :current="request()->routeIs('jury.planning')"
                        wire:navigate
                    >
                        Planning
                    </flux:navbar.item>

                    <flux:navbar.item
                        icon="users"
                        :href="route('jury.candidats')"
                        :current="request()->routeIs('jury.candidats')"
                        wire:navigate
                    >
                        Candidats
                    </flux:navbar.item>

                @endif

                @if(auth()->user()->hasRole('CAND'))

                    <flux:navbar.item
                        icon="document-text"
                        :href="route('convocation')"
                        :current="request()->routeIs('convocation')"
                        wire:navigate
                    >
                        Ma convocation
                    </flux:navbar.item>

                @endif

            </flux:navbar>

            <flux:spacer />

            <x-desktop-user-menu />

        </flux:header>

        <flux:sidebar
            collapsible="mobile"
            sticky
            class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
        >

            <flux:sidebar.header>
                <a
                    href="{{ route('menu') }}"
                    class="font-semibold text-zinc-900 dark:text-white"
                    wire:navigate
                >
                    Convocations CCF
                </a>

                <flux:sidebar.collapse />
            </flux:sidebar.header>

            <flux:sidebar.nav>

                <flux:sidebar.group heading="Navigation">

                    <flux:sidebar.item
                        icon="home"
                        :href="route('menu')"
                        :current="request()->routeIs('menu')"
                        wire:navigate
                    >
                        Accueil
                    </flux:sidebar.item>

                    @if(auth()->user()->hasRole('ADMIN'))

                        <flux:sidebar.item
                            icon="users"
                            :href="route('utilisateurs.index')"
                            :current="request()->routeIs('utilisateurs.*')"
                            wire:navigate
                        >
                            Utilisateurs
                        </flux:sidebar.item>

                        <flux:sidebar.item
                            icon="cog-6-tooth"
                            :href="route('parametrage.index')"
                            :current="request()->routeIs('parametrage.*')"
                            wire:navigate
                        >
                            Paramétrage
                        </flux:sidebar.item>

                    @endif

                    @if(auth()->user()->hasRole('GEST'))

                        <flux:sidebar.item
                            icon="academic-cap"
                            :href="route('epreuves.index')"
                            :current="request()->routeIs('epreuves.*')"
                            wire:navigate
                        >
                            Épreuves
                        </flux:sidebar.item>

                    @endif

                    @if(
                        auth()->user()->hasRole('JURY_ENS')
                        || auth()->user()->hasRole('JURY_PRO')
                    )

                        <flux:sidebar.item
                            icon="calendar-days"
                            :href="route('jury.planning')"
                            :current="request()->routeIs('jury.planning')"
                            wire:navigate
                        >
                            Planning
                        </flux:sidebar.item>

                        <flux:sidebar.item
                            icon="users"
                            :href="route('jury.candidats')"
                            :current="request()->routeIs('jury.candidats')"
                            wire:navigate
                        >
                            Candidats
                        </flux:sidebar.item>

                    @endif

                    @if(auth()->user()->hasRole('CAND'))

                        <flux:sidebar.item
                            icon="document-text"
                            :href="route('convocation')"
                            :current="request()->routeIs('convocation')"
                            wire:navigate
                        >
                            Ma convocation
                        </flux:sidebar.item>

                    @endif

                </flux:sidebar.group>

            </flux:sidebar.nav>

        </flux:sidebar>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts

    </body>
</html>