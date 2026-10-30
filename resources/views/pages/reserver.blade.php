@extends('layouts.app')

@section('title', 'Réserver - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px; min-height: 100vh;">
    <div class="section-title">
        <h1>Réserver un service</h1>
        <p>Sélectionnez vos dates de réservation</p>
    </div>

    <div style="max-width: 700px; margin: 0 auto;">
        <form class="contact-form" method="POST" action="{{ route('reservations.store') }}">
            @csrf
            
            <input 
                type="hidden" 
                name="annonce_id" 
                value="{{ $annonce['id'] ?? '' }}"
            >

            <div style="background: white; padding: 20px; border-radius: 14px; margin-bottom: 15px;">
                <h3 style="color: #0f172a;">{{ $annonce['titre'] ?? 'Service' }}</h3>
                <p style="color: #64748b;">Prix: <strong style="color: #2bb89d;">{{ $annonce['prix'] ?? '0' }} DT</strong>/jour</p>
            </div>
            
            <label style="display: block; margin-bottom: 8px; color: #0f172a; font-weight: 700;">Date de début</label>
            <input 
                type="date" 
                name="date_debut" 
                required
            >
            
            <label style="display: block; margin-bottom: 8px; color: #0f172a; font-weight: 700;">Date de fin</label>
            <input 
                type="date" 
                name="date_fin" 
                required
            >
            
            <button type="submit">
                Confirmer la réservation
            </button>
        </form>
    </div>
</section>
@endsection
