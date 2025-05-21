<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'honeypot' => 'max:0', // Champ honeypot pour éviter les spams
        ]);

        // Si le champ honeypot est rempli, c'est probablement un bot
        if (!empty($request->honeypot)) {
            return response()->json([
                'message' => 'Message envoyé avec succès!'
            ], 200); // On renvoie un succès pour ne pas alerter le bot
        }

        // Vérification du taux de soumission (anti-spam)
        $ipAddress = $request->ip();
        $recentSubmissions = Contact::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subMinutes(5))
            ->count();

        if ($recentSubmissions >= 3) {
            return response()->json([
                'message' => 'Trop de messages envoyés. Veuillez réessayer plus tard.'
            ], 429);
        }

        // Création du contact
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'ip_address' => $ipAddress,
            'user_agent' => $request->userAgent(),
        ]);

        // Envoi de l'email directement à l'adresse de réception
        Mail::to('sedrickmungobo1@gmail.com')
            ->send(new ContactFormMail($contact));
        // Mail::to('reception@centrehospitaliernganda.com')
        //     ->send(new ContactFormMail($contact));

        // Redirection avec message de succès
        return back()->with('success', 'Votre message a été envoyé avec succès!');
    }
}
