@extends('layout')

@section('title', 'Accueil')

@section('content')
<!-- formulaire de modification de réservation -->
<form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="date_reservation" class="text-lg font-bold">Nouvelle date de réservation :</label>
        <input type="date" id="date_reservation" name="date_reservation" class="w-full bg-white border border-gray-300 rounded-md py-2 px-3" value="{{ $reservation->date_reservation }}">
    </div>

    <!-- Autres champs du formulaire de modification -->

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à jour</button>
</form>
@endsection