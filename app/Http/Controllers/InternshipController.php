<?php

namespace App\Http\Controllers;

use App\Mail\InternshipRequestMail;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class InternshipController extends Controller
{
    /**
     * Affiche le formulaire de demande de stage.
     */
    public function create()
    {
        return Inertia::render('Internship');
    }

    /**
     * Traite la soumission du formulaire de demande de stage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'education' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'message' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'motivation_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'honeypot' => 'max:0', // Champ honeypot pour éviter les spams
        ]);

        // Si le champ honeypot est rempli, c'est probablement un bot
        if (!empty($request->honeypot)) {
            return response()->json([
                'message' => 'Votre demande a été envoyée avec succès!'
            ], 200); // On renvoie un succès pour ne pas alerter le bot
        }

        // Vérification du taux de soumission (anti-spam)
        $ipAddress = $request->ip();
        $recentSubmissions = Internship::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subMinutes(5))
            ->count();

        if ($recentSubmissions >= 3) {
            return response()->json([
                'message' => 'Trop de demandes envoyées. Veuillez réessayer plus tard.'
            ], 429);
        }

        // Traitement des fichiers
        $cvPath = null;
        $motivationLetterPath = null;

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('internships/cv');
        }

        if ($request->hasFile('motivation_letter')) {
            $motivationLetterPath = $request->file('motivation_letter')->store('internships/motivation_letters');
        }

        // Création de la demande de stage
        $internship = Internship::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'education' => $validated['education'],
            'field' => $validated['field'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'message' => $validated['message'] ?? null,
            'cv_path' => $cvPath,
            'motivation_letter_path' => $motivationLetterPath,
            'status' => 'pending',
            'ip_address' => $ipAddress,
            'user_agent' => $request->userAgent(),
        ]);

        // Envoi de l'email
        Mail::to(config('mail.from.address'))
            ->send(new InternshipRequestMail($internship));

        // Redirection avec message de succès
        return back()->with('success', 'Votre demande de stage a été envoyée avec succès!');
    }
}
