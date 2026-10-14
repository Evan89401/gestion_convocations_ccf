<x-layouts::app :title="__('Modifier un utilisateur')">

    <div class="flex w-full flex-1 flex-col gap-6">

        <div>
            <flux:heading size="xl">
                Modifier un utilisateur
            </flux:heading>

            <flux:subheading>
                Modifier les informations de {{ $utilisateur->prenom }} {{ $utilisateur->nom }}.
            </flux:subheading>
        </div>

        @if($errors->any())
            <div class="rounded-lg border border-red-500/30 bg-red-500/10 p-4">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('utilisateurs.update', $utilisateur) }}"
            class="flex max-w-3xl flex-col gap-5"
        >
            @csrf

            <div class="grid gap-4 md:grid-cols-2">

                <flux:input
                    name="nom"
                    label="Nom"
                    value="{{ old('nom', $utilisateur->nom) }}"
                    required
                />

                <flux:input
                    name="prenom"
                    label="Prénom"
                    value="{{ old('prenom', $utilisateur->prenom) }}"
                    required
                />

            </div>

            <flux:input
                type="email"
                name="email"
                label="Email"
                value="{{ old('email', $utilisateur->compte?->email) }}"
                required
            />

            <div class="grid gap-4 md:grid-cols-3">

                <flux:select
                    name="id_role"
                    label="Rôle"
                    required
                >
                    @foreach($roles as $role)
                        <option
                            value="{{ $role->id }}"
                            @selected(old('id_role', $utilisateur->id_role) == $role->id)
                        >
                            {{ $role->nom }}
                        </option>
                    @endforeach
                </flux:select>

                <flux:select
                    name="code_statut"
                    label="Statut"
                    required
                >
                    @foreach($statuts as $statut)
                        <option
                            value="{{ $statut->code }}"
                            @selected(old('code_statut', $utilisateur->code_statut) == $statut->code)
                        >
                            {{ $statut->nom }}
                        </option>
                    @endforeach
                </flux:select>

                <flux:select
                    name="code_genre"
                    label="Genre"
                    required
                >
                    @foreach($genres as $genre)
                        <option
                            value="{{ $genre->code }}"
                            @selected(old('code_genre', $utilisateur->code_genre) == $genre->code)
                        >
                            {{ $genre->nom }}
                        </option>
                    @endforeach
                </flux:select>

            </div>

            <div class="grid gap-4 md:grid-cols-2">

                <flux:input
                    name="classe"
                    label="Classe"
                    value="{{ old('classe', $utilisateur->classe) }}"
                />

                <flux:input
                    name="numero_candidat"
                    label="Numéro candidat"
                    value="{{ old('numero_candidat', $utilisateur->numero_candidat) }}"
                />

            </div>

            <div class="flex gap-3">

                <flux:button
                    type="submit"
                    variant="primary"
                >
                    Enregistrer les modifications
                </flux:button>

                <flux:button
                    href="{{ route('utilisateurs.index') }}"
                    wire:navigate
                >
                    Annuler
                </flux:button>

            </div>

        </form>

    </div>

</x-layouts::app>