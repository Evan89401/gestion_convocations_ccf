<x-layouts::app :title="__('Utilisateurs')">

    <div class="flex w-full flex-1 flex-col gap-6">

        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">
                    Utilisateurs
                </flux:heading>

                <flux:subheading>
                    Gestion des utilisateurs de l'application.
                </flux:subheading>
            </div>

            <flux:button
                href="{{ route('utilisateurs.create') }}"
                variant="primary"
                wire:navigate
            >
                Ajouter un utilisateur
            </flux:button>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-green-500/30 bg-green-500/10 p-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-700">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-neutral-200 bg-zinc-50 dark:border-neutral-700 dark:bg-zinc-900">
                    <tr>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Prénom</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Rôle</th>
                        <th class="px-4 py-3">Statut</th>
                        <th class="px-4 py-3">Genre</th>
                        <th class="px-4 py-3 text-right">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($utilisateurs as $utilisateur)

                        <tr class="border-b border-neutral-200 last:border-b-0 dark:border-neutral-700">

                            <td class="px-4 py-3">
                                {{ $utilisateur->nom }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $utilisateur->prenom }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $utilisateur->compte?->email ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $utilisateur->role?->nom ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $utilisateur->statut?->nom ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $utilisateur->genre?->nom ?? '-' }}
                            </td>

                            <td class="px-4 py-3 text-right">

                                <flux:button
                                    size="sm"
                                    href="{{ route('utilisateurs.edit', $utilisateur) }}"
                                    wire:navigate
                                >
                                    Modifier
                                </flux:button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="7"
                                class="px-4 py-8 text-center text-zinc-500"
                            >
                                Aucun utilisateur.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-layouts::app>