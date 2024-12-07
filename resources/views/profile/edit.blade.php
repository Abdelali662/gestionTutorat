@extends('layout.nav')

@section('contenue')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4 text-center">
                <h1 class="text-primary">Modifier le profil</h1>
                <p class="text-muted">Bienvenue, {{ $user->name }}.</p>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5>{{ __('Éditer le Profil') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <!-- Champ Nom -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nom') }}</label>
                            <input id="name" 
                                   type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Champ Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sélection du Rôle -->
                        <div class="mb-3">
                            <label for="role_id" class="form-label">{{ __('Rôle') }}</label>
                            <select id="role_id" 
                                    class="form-control @error('role_id') is-invalid @enderror" 
                                    name="role_id" 
                                    required>
                                <option value="" disabled>{{ __('Sélectionnez un Rôle') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" 
                                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nouveau Mot de Passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Nouveau Mot de Passe') }}</label>
                            <input id="password" 
                                   type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirmation du Mot de Passe -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirmer le Mot de Passe') }}</label>
                            <input id="password-confirm" 
                                   type="password" 
                                   class="form-control" 
                                   name="password_confirmation">
                        </div>

                        <!-- Bouton Soumettre -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Mettre à Jour le Profil') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
