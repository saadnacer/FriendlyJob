<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Reservation;


class ReservationController extends Controller
{
    public function showDescription($service_id)
    {
        $categories = Categorie::all($service_id);
        $service = Service::findOrFail($service_id);
        $jobworker = $service->jobworker; // Récupère le jobworker associé au service
        return view('service.descriptionservice', compact('service', 'categories', 'jobworker'));
    }

    public function serviceReservation(Request $request)
    {
        $validatedData = $request->validate([
            'date_reservation' => 'required|date',
            'jobworker_id'     => 'required',
            'service_id'       => 'required',
            'friendlyuser_id'  => 'required',
        ]);

        $friendlyuser_id = Auth::user()->id;
    
        $reservation = \App\Models\Reservation::create([
            'date_reservation' => $validatedData['date_reservation'],
            'jobworker_id'     => $validatedData['jobworker_id'],
            'service_id'       => $validatedData['service_id'],
            'friendlyuser_id'  => $friendlyuser_id,
        ]);
    
        $reservation->save();

        // Lier la réservation au service
        $service = Service::findOrFail($validatedData['service_id']);
        $reservation->service()->associate($service);

        return view ('welcome');

    }

    public function delete($id)
{
    // Trouver la réservation par son ID
    $reservation = Reservation::findOrFail($id);

    // Vérifier si l'utilisateur connecté est autorisé à supprimer la réservation
    if ($reservation->friendlyuser_id === Auth::user()->id) {
        // Supprimer la réservation
        $reservation->delete();

        // Rediriger vers la page Mon Compte ou une autre page appropriée
        return redirect()->route('compte.comptefriendlyuser')->with('success', 'Réservation supprimée avec succès.');
    } else {
        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé à supprimer cette réservation
        return redirect()->route('compte.comptefriendlyuser')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette réservation.');
    }
}

public function edit($id)
{
    // Trouver la réservation par son ID
    $reservation = Reservation::findOrFail($id);

    // Vérifier si l'utilisateur connecté est autorisé à modifier la réservation
    if ($reservation->friendlyuser_id === Auth::user()->id) {
        // Afficher le formulaire de modification de réservation
        return view('/service/update', compact('reservation'));
    } else {
        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé à modifier cette réservation
        return redirect()->route('moncompte')->with('error', 'Vous n\'êtes pas autorisé à modifier cette réservation.');
    }
}

public function update(Request $request, $id)
{
    // Valider les données du formulaire de modification de réservation
    $validatedData = $request->validate([
        'date_reservation' => 'required|date',
        // Autres champs à valider le cas échéant
    ]);

    // Trouver la réservation par son ID
    $reservation = Reservation::findOrFail($id);

    // Vérifier si l'utilisateur connecté est autorisé à modifier la réservation
    if ($reservation->friendlyuser_id === Auth::user()->id) {
        // Mettre à jour les données de la réservation
        $reservation->update([
            'date_reservation' => $validatedData['date_reservation'],
            // Autres champs à mettre à jour le cas échéant
        ]);

        // Rediriger vers la page Mon Compte ou une autre page appropriée
        return redirect()->route('compte.comptefriendlyuser')->with('success', 'Réservation mise à jour avec succès.');
    } else {
        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé à modifier cette réservation
        return redirect()->route('compte.comptefriendlyuser')->with('error', 'Vous n\'êtes pas autorisé à modifier cette réservation.');
    }
}
}
