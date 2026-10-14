<x-layouts::app :title="__('Ajouter un utilisateur')">

    <div class="flex w-full flex-1 flex-col gap-6">

        <div>
            <flux:heading size="xl">
                Ajouter un utilisateur
            </flux:heading>

            <flux:subheading>
                Créer un nouveau compte utilisateur.
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
            action="{{ route('utilisateurs.store') }}"
            class="flex max-w-3xl flex-col gap-5"
        >
            @csrf

            <div class="grid gap-4 md:grid-cols-2">

                <flux:input
                    name="nom"
                    label="Nom"
                    value="{{ old('nom') }}"
                    required
                />

                <flux:input
                    name="prenom"
                    label="Prénom"
                    value="{{ old('prenom') }}"
                    required
                />

            </div>

            <flux:input
                type="email"
                name="email"
                label="Email"
                value="{{ old('email') }}"
                required
            />

            <flux:input
                type="password"
                name="password"
                label="Mot de passe"
                required
            />

            <div class="grid gap-4 md:grid-cols-3">

                <flux:select
                    name="id_role"
                    label="Rôle"
                    required
                >
                    <option value="">Sélectionner</option>

                    @foreach($roles as $role)
                        <option
                            value="{{ $role->id }}"
                            @selected(old('id_role') == $role->id)
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
                    <option value="">Sélectionner</option>

                    @foreach($statuts as $statut)
                        <option
                            value="{{ $statut->code }}"
                            @selected(old('code_statut') == $statut->code)
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
                    <option value="">Sélectionner</option>

                    @foreach($genres as $genre)
                        <option
                            value="{{ $genre->code }}"
                            @selected(old('code_genre') == $genre->code)
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
                    value="{{ old('classe') }}"
                />

                <flux:input
                    name="numero_candidat"
                    label="Numéro candidat"
                    value="{{ old('numero_candidat') }}"
                />

            </div>

            <div class="flex gap-3">

                <flux:button
                    type="submit"
                    variant="primary"
                >
                    Enregistrer
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