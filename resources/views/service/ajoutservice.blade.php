@extends('layout')

@section('title', 'FriendlyJob')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="flex items-center shadow-lg max-w-lg mx-auto md:flex">
        <div class="p-4 flex-1 md:flex md:flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">ajoute ton service</h2>
            @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            <form action="/service/ajout" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @error('libelle')
                    {{$message}}
                    @enderror
                    @error('description')
                    {{$message}}
                    @enderror
                    @error('prix')
                    {{$message}}
                    @enderror
                    @error('photo')
                    {{$message}}
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="libelle">nom du service</label>
                    <input type="text" id="libelle" name="libelle" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="description">description</label>
                    <input type="text" id="description" name="description" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="prix">prix(/H)</label>
                    <input type="text" id="prix" name="prix" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div>
                    <label for="categorie_id" class="text-white">Catégorie :</label>
                    <select name="categorie_id" id="categorie_id" class="w-full bg-white rounded-md py-2 px-3">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-[#87acec]" type="submit">
                    ajout service</button>
            </form>
        </div>
    </div>
</div>

@endsection