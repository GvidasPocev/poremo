@extends('layouts.app') <!-- Turi būti sukurtas jūsų pagrindinis šablonas (layouts/app.blade.php) -->

@section('content')

    <section class="container my-4">
        @if ($service)
            <h1>{{ $service->name }}</h1>
            <div class="card">
                <img src="{{ $service->image_url }}" class="card-img-top" alt="{{ $service->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text">{!! $service->description !!}</p>
                    <a href="{{ route('services') }}" class="btn btn-secondary">Atgal į paslaugos</a>
                </div>
            </div>
        @else
            <p class="alert alert-danger">Paslauga nerasta</p>
        @endif
    </section>

@endsection
