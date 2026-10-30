@extends('layouts.app')

@section('title', 'Détail annonce - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px;">
    <div style="max-width: 900px; margin: 0 auto;">
        <a href="{{ route('annonces.index') }}" style="color: #2bb89d; text-decoration: none; font-weight: 700; margin-bottom: 30px; display: inline-block;">
            ← Retour aux services
        </a>

        <div style="background: white; border-radius: 28px; padding: 40px; box-shadow: 0 12px 32px rgba(15,23,42,.07);">
            @if (isset($annonce['image']))
                <img 
                    src="{{ asset('uploads/' . $annonce['image']) }}" 
                    alt="Annonce"
                    style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 20px; margin-bottom: 30px;"
                >
            @else
                <img 
                    src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?q=80&w=1200&auto=format&fit=crop" 
                    alt="Annonce"
                    style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 20px; margin-bottom: 30px;"
                >
            @endif

            <div style="margin-bottom: 30px;">
                <span style="color: #2bb89d; font-weight: 800; font-size: 14px;">
                    {{ $annonce['categorie'] ?? 'N/A' }} | {{ $annonce['type_annonce'] ?? 'Vente' }}
                </span>

                <h1 style="font-size: 42px; font-weight: 900; margin: 15px 0;">
                    {{ $annonce['titre'] ?? 'Titre' }}
                </h1>

                <p style="color: #64748b; font-size: 17px; line-height: 1.8;">
                    {{ $annonce['description'] ?? 'Description' }}
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                <div>
                    <h3 style="color: #0f172a; margin-bottom: 10px;">Prix</h3>
                    <p style="font-size: 32px; font-weight: 900; color: #2bb89d;">
                        {{ $annonce['prix'] ?? '0' }} DT
                    </p>
                </div>

                <div>
                    <h3 style="color: #0f172a; margin-bottom: 10px;">Localisation</h3>
                    <p style="color: #64748b; font-size: 16px;">
                        📍 {{ $annonce['ville'] ?? 'N/A' }}<br>
                        {{ $annonce['adresse'] ?? '' }}
                    </p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                @if (session('user_id') == ($annonce['vendeur_id'] ?? null))
                    <a 
                        href="{{ route('annonces.edit', $annonce['id'] ?? 0) }}" 
                        class="edit-btn"
                        style="text-align: center; padding: 16px;"
                    >
                        Modifier
                    </a>

                    <form method="POST" action="{{ route('annonces.destroy', $annonce['id'] ?? 0) }}" style="display: inline; width: 100%;">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="delete-btn"
                            style="width: 100%; padding: 16px; border: none; cursor: pointer;"
                            onclick="return confirm('Êtes-vous sûr?')"
                        >
                            Supprimer
                        </button>
                    </form>
                @else
                    <a 
                        href="{{ route('reservations.create', $annonce['id'] ?? 0) }}" 
                        class="login-btn"
                        style="text-align: center; padding: 16px; text-decoration: none; display: block;"
                    >
                        Réserver
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
