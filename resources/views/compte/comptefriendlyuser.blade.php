@extends('layout')

@section('title', 'Mon Compte')

@section('content')
<div class="container mx-auto py-8">
  <div class="flex">
    <div class="w-[500px] pr-8">
      <div class="mb-4">
        <img class="bg-auto w-[150px] h-[150px]" src="{{ asset('storage/' . $friendlyuser->image) }}" alt="">
        <h3 class=" text-2xl font-bold text-gray-800 mb-2"><a href="#">Nom : {{ auth()->guard('friendlyuser')->user()->nom }}</a></h3>
        <h4 class=" text-2xl font-bold text-gray-800 mb-2"><a href="#">Email : {{ auth()->guard('friendlyuser')->user()->email }}</a></h4>
        <h4 class=" text-2xl font-bold text-gray-800 mb-2"><a href="#">Inscription : {{ auth()->guard('friendlyuser')->user()->created_at }}</a></h4>
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
        <h2 class="text-2xl font-bold">Catégories</h2>
        <select id="reservation-select" class="w-full px-4 py-2 mt-2 border rounded-md">
          <option value="">Sélectionnez une catégorie</option>
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

      <div class="flex flex-col align w-full gap-5 p-5">
        <span><a href="/compte/edit/{{ $friendlyuser->id }}">Modification</a></span>
        <span><a href="#">Message</a></span>
        <span><a href="#">Services demandés</a></span>
        <span><a class="text-red-500" href="#">Supprimer mon compte</a></span>
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
        <!-- Boucle pour afficher les services réservés par l'utilisateur -->
        @foreach ($reservations as $reservation)
        @if ($reservation->friendlyuser_id === Auth::user()->id)
          <div class="bg-white shadow-md rounded-lg p-4 mt-4">
            <h3 class="text-xl font-bold"> {{ $reservation->service->libelle }} </h3>
            <p> {{ $reservation->service->description }} </p>
            <p> {{ $reservation->service->prix }} </p>
            <p>Date de réservation : {{ $reservation->date_reservation }}</p>
            <p>Nom du Jobworker: {{ $reservation->jobworker->nom }} {{ $reservation->jobworker->prenom }}</p>
            
            @if ($reservation->jobworker->metiers->count() > 0)
                <p>Métiers :</p>
                <ul>
                    @foreach ($reservation->jobworker->metiers as $metier)
                        <li>{{ $metier->libelle }}</li>
                    @endforeach
                </ul>
            @else
                <p>Métier non défini</p>
            @endif
            
            <!-- Boutons pour supprimer et modifier la réservation -->
            <div class="mt-2">
              <form action="{{ route('reservation.delete', $reservation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
              </form>
              <a href="{{ route('reservation.edit', $reservation->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">Modifier</a>
            </div>
            
          </div>
        @endif
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
