@extends('layout')

@section('title', 'Service')

@section('content')
<div class="flex h-full gap-4">
    <div class="flex flex-col gap-8 w-[300px] shadow p-4">
        <div>
            <label for="recherche" class="text-white">Chercher :</label>
            <input class="w-full bg-white rounded-md py-2 px-3" type="search" id="recherche">
        </div>
        <div>
            <label for="pet-select" class="text-white">Services :</label>
            <select name="pets" id="pet-select" class="w-full bg-white rounded-md py-2 px-3">
                <option value="">Choisir un service</option>
                <option value="dog">1</option>
                <option value="cat">2</option>
                <option value="hamster">3</option>
                <option value="parrot">4</option>
                <option value="spider">5</option>
                <option value="goldfish">6</option>
            </select>
        </div>
        <div>
            <label for="categorie-select" class="text-white">Catégorie :</label>
            <select name="categorie" id="categorie-select" class="w-full bg-white rounded-md py-2 px-3">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="prix-select" class="text-white">Prix :</label>
            <select name="prix" id="prix-select" class="w-full bg-white rounded-md py-2 px-3">
                <option value="">Tous les prix</option>
                <option value="prix1">Moins de 50$</option>
                <option value="prix2">50$ - 100$</option>
                <option value="prix3">Plus de 100$</option>
            </select>
        </div>
        <div>
            <label for="disponibilite-checkbox" class="text-white">Disponibilité :</label>
            <input type="checkbox" id="disponibilite-checkbox">
            <label for="disponibilite-checkbox" class="text-white">Disponible uniquement</label>
        </div>
    </div>
    <div class="flex flex-wrap shadow p-4 gap-8 w-full h-full">
        @foreach ($services as $service)
        <div class="h-[400px] w-[300px] max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-b from-gray-200 to-gray-300">
            <img class="w-full h-[180px]" src="{{ asset('storage/' . $service->photo) }}" alt="Image du produit">
            <div class="px-6 py-4 ">
                <div class="font-bold text-xl mb-2">{{ $service->libelle }}</div>
                <p class="text-blue-900 text-base">
                    {{ $service->description }}
                </p>
                <p class="text-blue-900 text-base">categorie :
                    {{ $service->categorie->libelle }}
                </p>
                <p class="text-blue-900 text-base mb-2">Jobworker : {{ $service->jobworker->nom }} {{ $service->jobworker->prenom }} </p>
                <p class="text-gray-900 font-bold text-xl mt-2">Prix : {{ $service->prix }}/h €</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4">Demande</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection