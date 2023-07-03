@extends('layout')

@section('title', 'FriendlyJob')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="flex items-center shadow-lg max-w-lg mx-auto md:flex">
        <!-- <img class="flex-1 w-full h-full md:h-full object-cover" src="assets/img/logo/logo.png" alt=""> -->
        <div class="p-4 flex-1 md:flex md:flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">ajoute ton service</h2>
            <form action="/service/ajout" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-600" for="libelle">libelle</label>
                    <input type="text" id="libelle" name="libelle" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="description">description</label>
                    <input type="text" id="description" name="description" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600" for="prix">prix</label>
                    <input type="text" id="prix" name="prix" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                </div>
                
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-[#87acec]" type="submit">
                    ajout service</button>
            </form>
        </div>
    </div>
</div>

@endsection