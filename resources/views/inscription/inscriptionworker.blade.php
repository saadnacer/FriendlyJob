@extends('layout')

@section('title', 'FriendlyJob')

@section('content')

<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col items-center shadow-lg max-w-lg mx-auto p-4 md:flex-row md:p-0">
        <!-- <img class="flex-1 w-full h-full md:h-full object-cover" src="assets/img/logo/logo.png" alt=""> -->
        <div class="p-4 flex-1 md:flex md:flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Inscription jobworker</h2>
            @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            <form action="/jobworker/ajouter" method="POST" role="form" class="dm-form" data-aos="fade-up" data-aos-delay="100">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-600" for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                        @error('nom')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                        @error('prenom')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="email">Email</label>
                        <input type="text" id="email" name="email" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                        @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="confirm_email">Confirmer Email</label>
                        <input type="text" id="confirm_email" name="confirm_email" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="pwd">Mot de passe</label>
                        <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                        @error('pwd')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="confirm_pwd">Confirmer Mot de passe</label>
                        <input type="password" id="confirm_pwd" name="confirm_pwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="siret">Siret</label>
                        <input type="text" id="siret" name="siret" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                        @error('siret')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="libelle">Métier</label>
                        <input type="text" id="libelle" name="libelle" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                        @error('libelle')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="categorie_id">Categorie métier</label>
                        <select id="categorie_id" name="categorie_id" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                            @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->libelle }}
                            </option>   
                            @endforeach 
                        </select>
                        @error('categorie_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-[#87acec] mt-4 mb-20" type="submit">Inscription</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
