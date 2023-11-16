@extends('layouts.app')

@section('content')
    <div class="content-max-gallery">
        <h1 class="text-center mb-4">{{ $gallery->title }}</h1>
        <div class="row">
            @php
                $images = $gallery->galleryImageLink;
                $totalImages = count($images);
                $columns = $settings['columns'];
                $imagesPerRow = $settings['row'] * $columns;
            @endphp

            @for ($i = 0; $i < $totalImages; $i += $columns)
                <div class="row mb-4">
                    @for ($j = $i; $j < $i + $columns && $j < $totalImages; $j++)
                        <div class="col-lg-{{ 12 / $columns }}">
                            <a href="{{ $images[$j] }}" data-fancybox="gallery" class="d-block mb-4">
                                <img src="{{ $images[$j] }}" alt="{{ $gallery->alt }}" class="img-fluid rounded">
                            </a>
                        </div>
                    @endfor
                </div>
            @endfor
        </div>
    </div>
@stop
