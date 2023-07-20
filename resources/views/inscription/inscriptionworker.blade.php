@extends('layout')

@section('title', 'Inscription jobworker')

@section('content')

<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col items-center shadow-lg max-w-lg mx-auto p-4 md:flex-row md:p-0">
        <div class="p-4 flex-1 md:flex md:flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Inscription jobworker</h2>
            @if ($errors)
            <div class="text-red-600 font-bold p-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            <form action="/inscription/ajouter" method="post" role="form" class="dm-form" data-aos="fade-up" data-aos-delay="100">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-600" for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="email">Email</label>
                        <input type="text" id="email" name="email" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="email">Confirmer Email</label>
                        <input type="text" id="email" name="email" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="pwd">Mot de passe</label>
                        <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="pwd">Confirmer Mot de passe</label>
                        <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="siret">Siret</label>
                        <input type="text" id="siret" name="siret" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-600" for="libelle">Metier</label>
                        <input type="text" id="libelle" name="libelle" class="border border-gray-300 shadow-inner py-2 px-3 text-gray-700 w-full hover:bg-gray-100">
                    </div>

                </div>

                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-[#87acec] mt-4 mb-20" type="submit">
                    Inscription</button>
            </form>
        </div>
    </div>
</div>
@endsection