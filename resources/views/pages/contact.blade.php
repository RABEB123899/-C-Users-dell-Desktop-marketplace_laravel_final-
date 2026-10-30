@extends('layouts.app')

@section('title', 'Contact - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px; min-height: 100vh;">
    <div class="section-title">
        <h1>Contactez-nous</h1>
        <p>Nous sommes à votre écoute pour répondre à vos questions.</p>
    </div>

    <div style="max-width: 600px; margin: 0 auto;">
        <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
            @csrf
            
            <input 
                type="text" 
                name="nom" 
                placeholder="Votre nom" 
                required
            >
            
            <input 
                type="email" 
                name="email" 
                placeholder="Votre email" 
                required
            >
            
            <textarea 
                name="message" 
                placeholder="Votre message..." 
                required
            ></textarea>
            
            <button type="submit">
                Envoyer le message
            </button>
        </form>
    </div>
</section>
@endsection
