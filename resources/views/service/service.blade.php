@extends('layout')

@section('title', 'Accueil')

@section('content')
<div class="flex h-full gap-4">
    <div class="flex flex-col gap-8 w-[300px] shadow p-4">
        <form action="{{ route('service.search') }}" method="GET">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="libelle">
                    Libellé du service :
                </label>
                <input type="text" name="libelle" id="libelle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Rechercher par libellé">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categorie">
                    Catégorie :
                </label>
                <select id="reservation-select" class="w-full px-4 py-2 mt-2 border rounded-md">
                    <option value="">catégorie</option>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prix_min">
                    Prix minimum :
                </label>
                <input type="number" name="prix_min" id="prix_min" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Prix minimum">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prix_max">
                    Prix maximum :
                </label>
                <input type="number" name="prix_max" id="prix_max" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Prix maximum">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
    <div class="flex flex-wrap shadow p-4 gap-8 w-full h-full">
        @foreach ($services as $service)
        <div class="h-[300px] w-[350px] max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-b from-gray-200 to-gray-300">
            <img class="w-full" src="{{ asset('storage/' . $service->image->image) }}" alt="Image du produit">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $service->libelle }}</div>
                <p class="text-gray-700 text-base">
                    {{ $service->description }}
                </p>
                <p class="text-gray-900 font-bold text-xl mt-2">Prix : {{ $service->prix }}</p>
                <p class="text-gray-600 text-sm mt-2">Prestataire : {{ $service->jobworker->nom }} {{ $service->jobworker->prenom }}</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4">
                    <a href="{{ route('service.show', $service->id) }}" class="text-white">Demande</a>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection