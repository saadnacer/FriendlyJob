@extends('layout')

@section('title', 'Mon Compte')

@section('content')
<div class="container mx-auto py-8">
  <div class="flex">
    <div class="w-1/4 pr-8">
      <div class="mb-4">
        <h2 class="text-2xl font-bold">Historique des demandes</h2>
        <select id="demande-select" class="w-full px-4 py-2 mt-2 border rounded-md">
          <option value="">Sélectionnez une demande</option>
          <!-- Options pour les demandes de l'utilisateur -->
          <option value="demande1">Demande 1</option>
          <option value="demande2">Demande 2</option>
          <option value="demande3">Demande 3</option>
        </select>
      </div>

      <div class="mb-4">
        <h2 class="text-2xl font-bold">Réservations en attente</h2>
        <select id="reservation-select" class="w-full px-4 py-2 mt-2 border rounded-md">
          <option value="">Sélectionnez une réservation</option>
          <!-- Options pour les réservations en attente -->
          <option value="reservation1">Réservation 1</option>
          <option value="reservation2">Réservation 2</option>
          <option value="reservation3">Réservation 3</option>
        </select>
      </div>

      <div class="mb-4">
        <h2 class="text-2xl font-bold">Categories</h2>
        <select id="reservation-select" class="w-full px-4 py-2 mt-2 border rounded-md">
          <option value="">Sélectionnez une categorie</option>
          @foreach($categories as $categorie)
          <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-4">
        <h2 class="text-2xl font-bold">Réservations en attente</h2>
        <select id="reservation-select" class="w-full px-4 py-2 mt-2 border rounded-md">
          <option value="">Sélectionnez une réservation</option>
          <!-- Options pour les réservations en attente -->
          <option value="reservation1">Réservation 1</option>
          <option value="reservation2">Réservation 2</option>
          <option value="reservation3">Réservation 3</option>
        </select>
      </div>

      <div class=" flex flex-col align w-full gap-5 p-5 ">
        <span><a href="#">Profil</a></span>
        <span><a href="#">Notification</a></span>
        <span><a href="#">Message</a></span>
        <span><a href="#">Mes services</a></span>
        <span><a href="/service/ajout" target="blank">Depot service</a></span>
        <span><a class=" text-red-500 " href="#">Supprimer mon compte</a></span>
      </div>
    </div>

    <div class="w-3/4 pl-8">
      <div class="mb-4 hidden" id="demande-details">
        <!-- Contenu des détails de la demande -->
        <h3 class="text-xl font-bold">Détails de la demande sélectionnée</h3>
        <!-- Autres informations sur la demande -->
      </div>

      <div class="mb-4 hidden" id="reservation-details">
        <!-- Contenu des détails de la réservation -->
        <h3 class="text-xl font-bold">Détails de la réservation sélectionnée</h3>
        <!-- Autres informations sur la réservation -->
      </div>

      <div>
        <h2 class="text-2xl font-bold">Mes services</h2>
        <!-- Boucle pour afficher les services de l'utilisateur -->
        @foreach ($services as $service)
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
          <h3 class="text-xl font-bold"> {{ $service->libelle }} </h3>
          <p> {{ $service->description }} </p>
          <p> {{ $service->prix }} </p>
        </div>
        @endforeach
        @foreach ($jobworkers as $jobworker)
    <p>Nom: {{ $jobworker->nom }}</p>
    <p>Prénom: {{ $jobworker->prenom }}</p>
    @if ($jobworker->metier)
        <p>Métier: {{ $jobworker->metier->libelle }}</p>
        <p>Catégorie: {{ $jobworker->metier->categorie->libelle }}</p>
    @else
        <p>Métier non défini</p>
    @endif
@endforeach
      </div>
    </div>
  </div>
</div>

@endsection