@extends('layouts.app')

@section('title', 'Mes réservations - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px;">
    <div class="section-title">
        <h1>Mes réservations</h1>
        <p>Gérez vos réservations en cours</p>
    </div>

    <div style="max-width: 900px; margin: 0 auto;">
        @forelse ($reservations ?? [] as $reservation)
            <div style="background: white; border-radius: 20px; padding: 25px; margin-bottom: 20px; box-shadow: 0 12px 32px rgba(15,23,42,.07);">
                <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 30px; align-items: center;">
                    <div>
                        <h3 style="font-size: 24px; font-weight: 900; margin-bottom: 8px;">
                            {{ $reservation['annonce']['titre'] ?? 'Service' }}
                        </h3>
                        <p style="color: #64748b;">
                            📅 Du {{ $reservation['date_debut'] ?? 'N/A' }} au {{ $reservation['date_fin'] ?? 'N/A' }}
                        </p>
                        <p style="color: #0f172a; font-weight: 700;">
                            <span style="display: inline-block; background: #dff8f1; color: #2bb89d; padding: 6px 12px; border-radius: 14px; font-size: 14px;">
                                {{ $reservation['statut'] ?? 'Attente' }}
                            </span>
                        </p>
                    </div>

                    <div>
                        <p style="color: #64748b; margin-bottom: 8px;">Prix/jour</p>
                        <p style="font-size: 28px; font-weight: 900; color: #2bb89d;">
                            {{ $reservation['annonce']['prix'] ?? '0' }} DT
                        </p>
                    </div>

                    <div style="display: flex; gap: 10px; flex-direction: column;">
                        <a 
                            href="{{ route('reservations.edit', $reservation['id'] ?? 0) }}" 
                            class="edit-btn"
                            style="text-align: center; padding: 12px; text-decoration: none;"
                        >
                            Modifier
                        </a>

                        <form method="POST" action="{{ route('reservations.destroy', $reservation['id'] ?? 0) }}" style="display: block;">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="delete-btn"
                                style="width: 100%; padding: 12px; border: none; cursor: pointer;"
                                onclick="return confirm('Êtes-vous sûr?')"
                            >
                                Annuler
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 20px;">
                <p style="color: #64748b; font-size: 16px;">Vous n'avez pas encore de réservations.</p>
                <a href="{{ route('annonces.index') }}" style="display: inline-block; margin-top: 20px; color: #2bb89d; text-decoration: none; font-weight: 700;">
                    Parcourir les services →
                </a>
            </div>
        @endforelse
    </div>
</section>
@endsection
