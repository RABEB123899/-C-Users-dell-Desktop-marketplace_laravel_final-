@extends('layouts.app')

@section('title', 'Dashboard Vendeur - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px;">
    <div class="section-title">
        <h1>Dashboard Vendeur</h1>
        <p>Gérez vos annonces et réservations</p>
    </div>

    <div style="max-width: 1000px; margin: 0 auto;">
        <!-- Action buttons -->
        <div style="display: flex; gap: 15px; margin-bottom: 40px; flex-wrap: wrap;">
            <a 
                href="{{ route('annonces.create') }}" 
                class="login-btn"
                style="padding: 16px 32px; text-decoration: none; display: inline-block;"
            >
                + Créer une annonce
            </a>
            <a 
                href="{{ route('reservations.index') }}" 
                class="login-btn"
                style="padding: 16px 32px; text-decoration: none; display: inline-block; background: #5865f2;"
            >
                Mes réservations
            </a>
        </div>

        <!-- Mes annonces -->
        <h2 style="font-size: 32px; font-weight: 900; margin-bottom: 25px; margin-top: 50px;">Mes annonces</h2>
        
        <div class="services-grid">
            @forelse ($annonces ?? [] as $annonce)
                <div class="service-card">
                    @if (!empty($annonce['image']))
                        <img src="{{ asset('uploads/' . $annonce['image']) }}" alt="Annonce">
                    @else
                        <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?q=80&w=1200&auto=format&fit=crop" alt="Annonce">
                    @endif

                    <div class="service-content">
                        <span>{{ $annonce['categorie'] ?? 'N/A' }}</span>

                        <h3>{{ $annonce['titre'] ?? 'Titre' }}</h3>

                        <p>{{ Str::limit($annonce['description'] ?? '', 80) }}</p>

                        <div class="service-bottom">
                            <strong>{{ $annonce['prix'] ?? '0' }} DT</strong>
                            <div class="action-buttons">
                                <a href="{{ route('annonces.edit', $annonce['id']) }}" class="edit-btn">Modifier</a>
                                <form method="POST" action="{{ route('annonces.destroy', $annonce['id']) }}" style="display: inline; width: 100%;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" style="width: 100%;" onclick="return confirm('Êtes-vous sûr?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: white; border-radius: 20px;">
                    <p style="color: #64748b; font-size: 16px;">Vous n'avez pas encore créé d'annonces.</p>
                    <a href="{{ route('annonces.create') }}" style="display: inline-block; margin-top: 20px; color: #2bb89d; text-decoration: none; font-weight: 700;">
                        Créer votre première annonce →
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Réservations reçues -->
        <h2 style="font-size: 32px; font-weight: 900; margin-bottom: 25px; margin-top: 50px;">Réservations reçues</h2>
        
        <div>
            @forelse ($reservations ?? [] as $reservation)
                <div style="background: white; border-radius: 20px; padding: 25px; margin-bottom: 20px; box-shadow: 0 12px 32px rgba(15,23,42,.07);">
                    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 30px; align-items: center;">
                        <div>
                            <h3 style="font-size: 24px; font-weight: 900; margin-bottom: 8px;">
                                {{ $reservation['annonce']['titre'] ?? 'Service' }}
                            </h3>
                            <p style="color: #64748b;">
                                Acheteur: <strong>{{ $reservation['acheteur']['nom'] ?? 'N/A' }}</strong>
                            </p>
                            <p style="color: #64748b;">
                                📅 Du {{ $reservation['date_debut'] ?? 'N/A' }} au {{ $reservation['date_fin'] ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p style="color: #64748b; margin-bottom: 8px;">Statut</p>
                            <p style="display: inline-block; background: #dff8f1; color: #2bb89d; padding: 8px 16px; border-radius: 14px; font-weight: 700; font-size: 14px;">
                                {{ $reservation['statut'] ?? 'Attente' }}
                            </p>
                        </div>

                        <div style="display: flex; gap: 10px; flex-direction: column;">
                            <select style="padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; cursor: pointer;">
                                <option>Changer statut</option>
                                <option>Approuver</option>
                                <option>Rejeter</option>
                            </select>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 20px;">
                    <p style="color: #64748b; font-size: 16px;">Vous n'avez pas encore reçu de réservations.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
