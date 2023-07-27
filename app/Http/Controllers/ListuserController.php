<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Friendlyuser;
use Illuminate\Http\Request;

class ListuserController extends Controller
{
    public function index()
    {
        $users = Friendlyuser::all();
        return view('/admin/utilisateurs', compact('users'));
    }

    public function destroy($id)
{
    try {
        // Démarrez une transaction
        DB::beginTransaction();

        // Trouver l'utilisateur à supprimer
        $user = Friendlyuser::findOrFail($id);

        // Supprimer les réservations associées à l'utilisateur (s'il y en a)
        $user->reservations()->delete();

        // Supprimer l'utilisateur
        $user->delete();

        // Valider la transaction
        DB::commit();

        // Rediriger avec un message de succès
        return redirect()->route('admin.utilisateurs.index')->with('success', 'L\'utilisateur a été supprimé avec succès.');
    } catch (\Exception $e) {
        // En cas d'erreur, annuler la transaction
        DB::rollback();

        // Rediriger avec un message d'erreur
        return redirect()->route('admin.utilisateurs.index')->with('error', 'Une erreur est survenue lors de la suppression de l\'utilisateur.');
    }
}
}