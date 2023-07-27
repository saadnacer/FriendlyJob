<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function envoyerMail(Request $request)
    {
        // Valider les données du formulaire si nécessaire

        // Récupérer les données du formulaire
        $nom = $request->input('nom');
        $email = $request->input('email');
        $message = $request->input('message');

        // Envoyer le message à votre boîte mail
        $to = 'rd1901@outlook.fr'; // Remplacez par votre adresse e-mail
        $subject = 'Nouveau message de FriendlyJob';
        $content = "Nom: $nom\n\nEmail: $email\n\nMessage: $message";

        mail($to, $subject, $content);

        // Rediriger l'utilisateur ou afficher un message de succès
        return redirect()->back()->with('success', 'Message envoyé avec succès !');
    }
}
