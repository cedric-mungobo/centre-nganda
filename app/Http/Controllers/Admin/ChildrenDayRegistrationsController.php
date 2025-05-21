<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildrenDayRegistration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChildrenDayRegistrationsController extends Controller
{
    /**
     * Affiche la liste des inscriptions pour la journée "Amenez vos enfants au travail".
     */
    public function index()
    {
        $registrations = ChildrenDayRegistration::orderBy('created_at', 'desc')->get();
        
        return Inertia::render('Admin/ChildrenDayRegistrations/Index', [
            'registrations' => $registrations
        ]);
    }
    
    /**
     * Affiche les détails d'une inscription.
     */
    public function show(ChildrenDayRegistration $registration)
    {
        return Inertia::render('Admin/ChildrenDayRegistrations/Show', [
            'registration' => $registration
        ]);
    }
    
    /**
     * Met à jour le statut d'une inscription.
     */
    public function updateStatus(Request $request, ChildrenDayRegistration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);
        
        $registration->update([
            'status' => $validated['status']
        ]);
        
        return redirect()->back()->with('success', 'Statut mis à jour avec succès');
    }
    
    /**
     * Supprime une inscription.
     */
    public function destroy(ChildrenDayRegistration $registration)
    {
        $registration->delete();
        
        return redirect()->route('admin.children-day-registrations.index')
            ->with('success', 'Inscription supprimée avec succès');
    }
}
