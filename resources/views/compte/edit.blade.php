<!-- edit.blade.php -->

@extends('layout')

@section('title', 'Modifier Mon Compte')

@section('content')
<div class="container mx-auto py-8">
    <div class="w-[500px] mx-auto">
        <h2 class="text-2xl font-bold mb-4">Modifier mes informations</h2>
        <form action="/compte/update/{{ $friendlyuser->id }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nom" class="block font-semibold mb-2">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom', $friendlyuser->nom) }}" class="w-full px-4 py-2 border rounded-md">
                @error('nom')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="prenom" class="block font-semibold mb-2">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $friendlyuser->prenom) }}" class="w-full px-4 py-2 border rounded-md">
                @error('prenom')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-2">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email', $friendlyuser->email) }}" class="w-full px-4 py-2 border rounded-md">
                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pwd" class="block font-semibold mb-2">Ancien Mot de passe</label>
                <input type="password" name="pwd" id="pwd" value="" class="w-full px-4 py-2 border rounded-md">
                @error('pwd')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pwd" class="block font-semibold mb-2">nouveau Mot de passe</label>
                <input type="password" name="new_pwd" id="new_pwd" value="" class="w-full px-4 py-2 border rounded-md">
                @error('pwd')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ajoutez ici les autres champs que vous souhaitez permettre de modifier -->

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection