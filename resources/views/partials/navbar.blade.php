<nav class="site-navbar">
    <div class="site-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        <span>Marketplace</span>
    </div>

    <div class="site-links">
        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('annonces.index') }}">Services</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <div class="site-actions">
        @if (session('user_id'))
            <span class="user-name">{{ session('nom') ?? 'Utilisateur' }}</span>
            <a href="{{ route('dashboard') }}" class="login-btn">Dashboard</a>
            <a href="{{ route('logout') }}" class="logout-btn">Déconnexion</a>
        @else
            <a href="{{ route('login') }}" class="login-btn">Connexion</a>
        @endif
    </div>
</nav>
