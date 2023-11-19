@extends('layouts.app') <!-- Turi būti sukurtas jūsų pagrindinis šablonas (layouts/app.blade.php) -->

@section('content')
    <section class="container my-4">
        @if ($service)
        {{-- Prideti kaip fetures --}}
            {{-- <h1>{{ $service->title }}</h1>
            <img src="{{ $service->innerMainImageLink }}" class="card-img-top" alt="{{ $service->name }}"> --}}
            <div class="service-content">
                <h3 class="card-title">{{ $service->name }}</h3>
                <p class="card-text">{!! $service->description !!}</p>
            </div>
        @else
            <p class="alert alert-danger">Paslauga nerasta</p>
        @endif
    </section>
@endsection
