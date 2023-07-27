@extends('layout')
@section('title','Modification du JobWorker')
@section('content')
<h1 class="text-2xl font-bold">Modification du JobWorker</h1>
<form action="/inscription/update/{{ $jobworker->id }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="nom" class="block text-gray-700 font-bold mb-2">Nom :</label>
        <input type="text" name="nom" id="nom" value="{{ $jobworker->nom }}" class="border border-gray-400 p-2 w-full" required>
    </div>
    <div class="mb-4">
        <label for="prenom" class="block text-gray-700 font-bold mb-2">Prenom :</label>
        <input type="text" name="prenom" id="prenom" value="{{ $jobworker->prenom }}" class="border border-gray-400 p-2 w-full" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email :</label>
        <input type="text" name="email" id="email" value="{{ $jobworker->email }}" class="border border-gray-400 p-2 w-full" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-bold mb-2">Password :</label>
        <input type="password" name="pwd" id="pwd" value="{{ $jobworker->pwd }}" class="border border-gray-400 p-2 w-full" required>
    </div>
    <div class="mb-4">
        <label for="siret" class="block text-gray-700 font-bold mb-2">Siret :</label>
        <input type="text" name="siret" id="siret" value="{{ $jobworker->siret }}" class="border border-gray-400 p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
</form>
@endsection