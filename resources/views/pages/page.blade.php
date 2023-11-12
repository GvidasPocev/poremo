@extends('layouts.app')
 
@section('content')
<div class="page content-max-block {{ $page->content_centered ? 'text-center' : '' }}">
    <h1>{{ $page->title }}</h1>

    {!! $page->content !!}

    @if($page->context_us_form)
    <div class="contact-us-block">
        @if ($message = Session::get('success'))
            <div class="validation-block-success">
                {{ $message }}
            </div>
        @else
            <form method="POST" action="{{ route('contact-us') }}">
                @csrf
                <h1>{{ __('content.cantactus.title') }}</h1>
                <input
                    id="name"
                    type="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="default-input"
                    placeholder="{{ __('content.cantactus.name') }}"
                />

                @error('name')
                    <div class="validation-block">{{ $message }}</div>
                @enderror

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="default-input"
                    placeholder="{{ __('content.cantactus.email') }}"
                    style="margin-top:20px;"
                />

                @error('email')
                    <div class="validation-block">{{ $message }}</div>
                @enderror

                <textarea 
                    id="message"
                    name="message"
                    placeholder="{{ __('content.cantactus.message') }}" 
                    style="resize: none; height: 150px; margin-top:20px;" 
                    class="default-input default-input-textarea "
                >{{ old('message') }}</textarea>

                @error('message')
                    <div class="validation-block">{{ $message }}</div>
                @enderror

                <button 
                    type="submit" 
                    class="default-button login-signin"
                >{{ __('content.cantactus.send') }}</button>
            </form>
        @endif
    </div>
    @endif
</div>

@if($page->has_map && isset($page->map_lat) && isset($page->map_lng))
    <div id="map" style="height: 500px"></div>

    <script>
        function initMap() {
            var hq = {lat: {{ $page->map_lat }}, lng: {{ $page->map_lng }}};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: hq,
                disableDefaultUI: true,
                styles: [
                    {elementType: 'geometry', stylers: [{color: '#d4d1c6'}]},
                    {elementType: 'labels.text.fill', stylers: [{color: '#000000'}]},
                    {
                        featureType: 'water',
                        elementType: 'geometry',
                        stylers: [{color: '#f1efe8'}]
                    },
                    {
                        featureType: 'administrative',
                        elementType: 'geometry',
                        stylers: [{color: '#ffffff'}]
                    },
                    {
                        featureType: 'administrative.province',
                        elementType: 'geometry',
                        stylers: [{ visibility: "off" }]
                    },
                    {
                        featureType: 'road',
                        elementType: 'geometry',
                        stylers: [{color: '#ffffff'}]
                    },
                    {
                        featureType: "road.highway",
                        elementType: "labels",
                        stylers: [
                            { visibility: "off" }
                        ]
                    },
                    {
                        featureType: "road.arterial",
                        elementType: "labels",
                        stylers: [
                            { visibility: "off" }
                        ]
                    },
                    {
                        featureType: "poi",
                        elementType: "labels",
                        stylers: [
                            { visibility: "off" }
                        ]
                    },
                    {
                        featureType: "transit",
                        elementType: "labels",
                        stylers: [
                            { visibility: "off" }
                        ]
                    },
                    {
                        featureType: "transit",
                        elementType: "geometry",
                        stylers: [
                            { visibility: "off" }
                        ]
                    }
                ],
            });

            var marker = new google.maps.Marker({
                position: hq,
                map: map
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBugghnvCGw4jYfrSbyi77cEQ1odDC044w&callback=initMap"></script>
@endif

@stop