<footer id="footer" class="bg-primary text-light">
    <div class="container py-5">
        <div class="row">
            @php
                $numberOfColumns = count($footerData);
                $columnClasses = [
                    1 => 'col-md-12',
                    2 => 'col-md-6',
                    3 => 'col-md-4',
                    4 => 'col-md-3',
                ];
                $columnClass = $columnClasses[$numberOfColumns];
            @endphp

            @foreach($footerData as $column)
                <div class="{{ $columnClass }}">
                    <h3>{{ $column['title'] }}</h3>
                    <ul>
                        @foreach($column['items'] as $item)
                            <li>{!! $item['text'] !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <p class="text-center mb-0">Copyright &copy; {{ date('Y') }} UAB „Poremo“</p>
    </div>
</footer>
