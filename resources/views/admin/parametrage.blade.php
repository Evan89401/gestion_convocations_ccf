<x-layouts::app :title="__('Paramétrage')">

    <div class="flex flex-col gap-6">

        <div>
            <flux:heading size="xl">Paramétrage</flux:heading>
            <flux:subheading>
                Gestion des rôles, statuts et genres.
            </flux:subheading>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-green-500 p-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="rounded-lg border border-red-500 p-4 text-red-500">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ROLES --}}
        <section class="rounded-xl border border-zinc-700 p-6">

            <flux:heading size="lg">Rôles</flux:heading>

            <table class="mt-4 w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-zinc-700">
                        <th class="p-3">Code</th>
                        <th class="p-3">Nom</th>
                        <th class="p-3">Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr class="border-b border-zinc-700">
                            <td class="p-3">{{ $role->code }}</td>
                            <td class="p-3">{{ $role->nom }}</td>
                            <td class="p-3">{{ $role->commentaire ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-3">Aucun rôle.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <form method="POST"
                  action="{{ route('parametrage.roles.store') }}"
                  class="mt-6 flex flex-col gap-4">

                @csrf

                <flux:heading>Ajouter un rôle</flux:heading>

                <div class="grid gap-4 md:grid-cols-2">
                    <flux:input
                        name="role_code"
                        label="Code"
                        maxlength="10"
                        value="{{ old('role_code') }}"
                        required
                    />

                    <flux:input
                        name="role_nom"
                        label="Nom"
                        value="{{ old('role_nom') }}"
                        required
                    />
                </div>

                <flux:input
                    name="role_commentaire"
                    label="Commentaire"
                    value="{{ old('role_commentaire') }}"
                />

                <div>
                    <flux:button type="submit" variant="primary">
                        Ajouter le rôle
                    </flux:button>
                </div>
            </form>

        </section>

        {{-- STATUTS --}}
        <section class="rounded-xl border border-zinc-700 p-6">

            <flux:heading size="lg">Statuts</flux:heading>

            <table class="mt-4 w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-zinc-700">
                        <th class="p-3">Code</th>
                        <th class="p-3">Nom</th>
                        <th class="p-3">Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statuts as $statut)
                        <tr class="border-b border-zinc-700">
                            <td class="p-3">{{ $statut->code }}</td>
                            <td class="p-3">{{ $statut->nom }}</td>
                            <td class="p-3">{{ $statut->commentaire ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-3">Aucun statut.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <form method="POST"
                  action="{{ route('parametrage.statuts.store') }}"
                  class="mt-6 flex flex-col gap-4">

                @csrf

                <flux:heading>Ajouter un statut</flux:heading>

                <div class="grid gap-4 md:grid-cols-2">
                    <flux:input
                        name="statut_code"
                        label="Code (1 lettre)"
                        maxlength="1"
                        value="{{ old('statut_code') }}"
                        required
                    />

                    <flux:input
                        name="statut_nom"
                        label="Nom"
                        value="{{ old('statut_nom') }}"
                        required
                    />
                </div>

                <flux:input
                    name="statut_commentaire"
                    label="Commentaire"
                    value="{{ old('statut_commentaire') }}"
                />

                <div>
                    <flux:button type="submit" variant="primary">
                        Ajouter le statut
                    </flux:button>
                </div>
            </form>

        </section>

        {{-- GENRES --}}
        <section class="rounded-xl border border-zinc-700 p-6">

            <flux:heading size="lg">Genres</flux:heading>

            <table class="mt-4 w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-zinc-700">
                        <th class="p-3">Code</th>
                        <th class="p-3">Nom</th>
                        <th class="p-3">Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($genres as $genre)
                        <tr class="border-b border-zinc-700">
                            <td class="p-3">{{ $genre->code }}</td>
                            <td class="p-3">{{ $genre->nom }}</td>
                            <td class="p-3">{{ $genre->commentaire ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-3">Aucun genre.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <form method="POST"
                  action="{{ route('parametrage.genres.store') }}"
                  class="mt-6 flex flex-col gap-4">

                @csrf

                <flux:heading>Ajouter un genre</flux:heading>

                <div class="grid gap-4 md:grid-cols-2">
                    <flux:input
                        name="genre_code"
                        label="Code (1 lettre)"
                        maxlength="1"
                        value="{{ old('genre_code') }}"
                        required
                    />

                    <flux:input
                        name="genre_nom"
                        label="Nom"
                        value="{{ old('genre_nom') }}"
                        required
                    />
                </div>

                <flux:input
                    name="genre_commentaire"
                    label="Commentaire"
                    value="{{ old('genre_commentaire') }}"
                />

                <div>
                    <flux:button type="submit"