<x-layouts::app :title="__('Accueil')">

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        <div>
            <flux:heading size="xl">
                Bonjour {{ auth()->user()->name }}
            </flux:heading>

            <flux:subheading>
                Bienvenue dans l'application de gestion des convocations CCF.
            </flux:subheading>
        </div>

        <div class="rounded-xl border border-neutral-200 p-6 dark:border-neutral-700">

            @if(auth()->user()->hasRole('ADMIN'))

                <flux:heading size="lg">
                    Espace administrateur
                </flux:heading>

                <flux:subheading class="mt-2">
                    Vous pouvez gérer les utilisateurs ainsi que les paramètres de l'application depuis le menu supérieur.
                </flux:subheading>

            @elseif(auth()->user()->hasRole('GEST'))

                <flux:heading size="lg">
                    Espace gestionnaire
                </flux:heading>

                <flux:subheading class="mt-2">
                    Vous pouvez gérer les épreuves, les affectations et les convocations depuis le menu supérieur.
                </flux:subheading>

            @elseif(auth()->user()->hasRole('JURY_ENS') || auth()->user()->hasRole('JURY_PRO'))

                <flux:heading size="lg">
                    Espace jury
                </flux:heading>

                <flux:subheading class="mt-2">
                    Vous pouvez consulter votre planning ainsi que les candidats à évaluer.
                </flux:subheading>

            @elseif(auth()->user()->hasRole('CAND'))

                <flux:heading size="lg">
                    Espace candidat
                </flux:heading>

                <flux:subheading class="mt-2">
                    Vous pouvez consulter votre convocation depuis le menu supérieur.
                </flux:subheading>

            @else

                <flux:heading size="lg">
                    Accueil
                </flux:heading>

                <flux:subheading class="mt-2">
                    Aucun rôle métier n'est associé à ce compte.
                </flux:subheading>

            @endif

        </div>

    </div>

</x-layouts::app>