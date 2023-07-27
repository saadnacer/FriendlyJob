@extends('layout')

@section('title', 'Profil')

@section('content')
<div class="flex flex-col items-center justify-center h-screen">
    <div class="max-w-2xl w-full bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            @if (Auth::guard('jobworker')->check())
            <h1 class="text-3xl font-bold text-gray-800">{{ $jobworker->nom }} {{ $jobworker->prenom }}</h1>
            <p class="text-gray-600">{{ $jobworker->email }}</p>
            <p class="text-gray-600">{{ $jobworker->siret }}</p>
            @else
            <p class="text-red-500">Vous devez être connecté en tant que JobWorker pour accéder à cette page.</p>
            @endif
        </div>
        <div class="px-6 pb-4 space-y-4">
            <a href="/service/ajout" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajoute un service</a>
        </div>
        <div class="px-6 pb-4 space-y-4">
            <a href="/inscription/listejobworker" class="bg-red-500 text-white px-1 py-1 rounded hover:bg-blue-600">Modif/suppr compte</a>
        </div>
    </div>
</div>
@endsection