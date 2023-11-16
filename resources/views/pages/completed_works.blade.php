@extends('layouts.app')

@section('content')
    <div class="content-max-table">
        <h1>{{ __('content.completedworks.title') }}</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('content.completedworks.id') }}.</th>
                        <th scope="col">{{ __('content.completedworks.structurename') }}</th>
                        <th scope="col">{{ __('content.completedworks.client') }}</th>
                        <th scope="col">{{ __('content.completedworks.taskscompleted') }}</th>
                        <th scope="col">{{ __('content.completedworks.date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                        @if ($work->status == 1)
                            <tr>
                                <td scope="row">{{ $work->id }}</td>
                                <td>{{ $work->structure_name }}</td>
                                <td>{{ $work->client }}</td>
                                <td>{{ $work->tasks_completed }}</td>
                                <td style="width:15%;vertical-align:middle;">{{ \Carbon\Carbon::parse($work->started)->format('Y') }} - {{ \Carbon\Carbon::parse($work->finished)->format('Y') }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
