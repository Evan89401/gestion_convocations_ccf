<x-layouts::app :title="__('Épreuves')">

    <div class="flex w-full flex-col gap-6">

        <div class="flex items-center justify-between gap-4">

            <div>
                <flux:heading size="xl">
                    Gestion des épreuves
                </flux:heading>

                <flux:subheading>
                    Consulter et organiser les épreuves CCF.
                </flux:subheading>
            </div>

            <flux:button
                href="{{ route('epreuves.create') }}"
                variant="primary"
                wire:navigate
            >
                Ajouter une épreuve
            </flux:button>

        </div>

        @if(session('success'))
            <div class="rounded-lg border border-green-500/30 bg-green-500/10 p-4 text-green-600 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-zinc-200 dark:border-zinc-700">

            <table class="w-full text-left text-sm">

                <thead class="bg-zinc-50 dark:bg-zinc-900">
                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Épreuve</th>
                        <th class="px-4 py-3">Début</th>
                        <th class="px-4 py-3">Fin</th>
                        <th class="px-4 py-3">Durée / candidat</th>
                        <th class="px-4 py-3">Lieu</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($epreuves as $epreuve)

                        <tr class="border-b border-zinc-200 last:border-0 dark:border-zinc-700">

                            <td class="px-4 py-3 font-medium">
                                {{ $epreuve->code }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $epreuve->nom }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $epreuve->date_debut }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $epreuve->date_fin }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $epreuve->duree_candidat }} min
                            </td>

                            <td class="px-4 py-3">
                                {{ $epreuve->lieu?->nom ?? '-' }}
                            </td>

                            <td class="px-4 py-3">

                                <div class="flex justify-end gap-2">

                                    <flux:button
                                        size="sm"
                                        href="{{ route('epreuves.affecter', $epreuve) }}"
                                    >
                                        Affecter
                                    </flux:button>

                                    <flux:button
                                        size="sm"
                                        href="{{ route('epreuves.convocations', $epreuve) }}"
                                    >
                                        Convocations
                                    </flux:button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-zinc-500">
                                Aucune épreuve enregistrée.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-layouts::app>