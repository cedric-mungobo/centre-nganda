<?php

namespace App\Http\Controllers;

use App\Models\ChildrenDayRegistration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChildrenDayController extends Controller
{
    /**
     * Affiche le formulaire d'inscription à la journée "Amenez vos enfants au travail".
     * Après le 30 juin, l'accès est désactivé.
     */
    public function create()
    {
        // Vérifier si la date actuelle est après le 30 juin 2025
        // Pour tester, vous pouvez temporairement changer cette date à une date passée
        $eventDate = \Carbon\Carbon::parse('2025-06-30');
        $currentDate = now();

        if ($currentDate->isAfter($eventDate)) {
            // Si la date est dépassée, afficher un message indiquant que l'inscription est fermée
            return Inertia::render('ChildrenDayClosed');
        }

        return Inertia::render('ChildrenDay');
    }

    /**
     * Traite la soumission du formulaire d'inscription.
     */
    public function store(Request $request)
    {
        // Vérifier si la date actuelle est après le 30 juin 2025
        // Pour tester, vous pouvez temporairement changer cette date à une date passée
        $eventDate = \Carbon\Carbon::parse('2025-06-30');
        $currentDate = now();

        if ($currentDate->isAfter($eventDate)) {
            // Si la date est dépassée, rediriger vers la page indiquant que l'inscription est fermée
            return Inertia::render('ChildrenDayClosed');
        }

        // Validation des données
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'children_count' => 'required|integer|min:1|max:10',
            'children_ages' => 'required|array|min:1',
            'children_ages.*' => 'required|integer|min:1',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string',
            'honeypot' => 'max:0', // Champ honeypot pour éviter les spams
        ]);

        // Si le champ honeypot est rempli, c'est probablement un bot
        if (!empty($request->honeypot)) {
            // On renvoie un succès pour ne pas alerter le bot
            return Inertia::render('ChildrenDaySuccess');
        }

        // Vérification du taux de soumission (anti-spam)
        $ipAddress = $request->ip();
        $recentSubmissions = ChildrenDayRegistration::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subMinutes(5))
            ->count();

        if ($recentSubmissions >= 3) {
            return Inertia::render('ChildrenDay', [
                'error' => 'Trop de demandes envoyées. Veuillez réessayer plus tard.'
            ])->with('error', 'Trop de demandes envoyées. Veuillez réessayer plus tard.');
        }

        // Création de l'inscription
        ChildrenDayRegistration::create([
            'parent_name' => $validated['parent_name'],
            'department' => $validated['department'],
            'children_count' => $validated['children_count'],
            'children_ages' => $validated['children_ages'],
            'phone' => $validated['phone'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
            'ip_address' => $ipAddress,
            'user_agent' => $request->userAgent(),
        ]);

        // Note: Pas d'envoi d'email car nous n'avons pas collecté d'adresse email

        // Redirection vers la page de confirmation
        return Inertia::render('ChildrenDaySuccess');
    }
}
