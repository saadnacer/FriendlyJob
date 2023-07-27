@extends('layout')

@section('title', $service->libelle)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ isset($service) ? $service->libelle : '' }}</h1>
        <p class="text-gray-700 mb-4">{{ isset($service) ? $service->description : '' }}</p>
        <p class="text-gray-900 font-bold">Prix : {{ isset($service) ? $service->prix : '' }}</p>
        <p class="text-gray-900 font-bold">ID du service : {{ isset($service) ? $service->id : '' }}</p>
    </div>

    <div class="max-w-lg mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Calendrier de réservation</h2>
        <div id="calendar" class="bg-gray-100 rounded-md p-4"></div>
        
        <form action="/reservation/reserver" method="POST">
            @csrf
        
            <div class="mb-4">
                <label for="date_reservation" class="text-lg font-bold">Date de réservation :</label>
                <input type="date" id="date_reservation" name="date_reservation" class="w-full bg-white border border-gray-300 rounded-md py-2 px-3">
                <input type="hidden" id="friendlyuser_id" name="friendlyuser_id" value="{{ Auth::user()->id }}">
                <input type="hidden" id="jobworker_id" name="jobworker_id" value="{{ $service->jobworker->id }}" class="w-full bg-white border border-gray-300 rounded-md py-2 px-3">
                <input type="hidden" id="service_id" name="service_id" value="{{ $service->id }}" class="w-full bg-white border border-gray-300 rounded-md py-2 px-3">
            </div>
        
            <!-- Autres champs du formulaire -->
        
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4">Réserver</button>
        </form>

    </div>

    <div class="max-w-lg mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Notes et commentaires</h2>
        <div class="mb-4">
            <!-- Système de notation -->
            <div class="flex items-center">
                <span class="text-lg font-bold mr-2">Note :</span>
                <div class="flex items-center">
                    <!-- Intégrez ici votre composant d'affichage des étoiles pour la notation -->
                </div>
            </div>
        </div>

        <!-- Formulaire de commentaire -->
        <form>
            <div class="mb-4">
                <label for="comment" class="text-lg font-bold">Commentaire :</label>
                <textarea id="comment" class="w-full bg-white border border-gray-300 rounded-md py-2 px-3"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Envoyer</button>
        </form>
    </div>
</div>
@endsection