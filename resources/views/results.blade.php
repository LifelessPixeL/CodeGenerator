@extends('layouts.app')

@section('content')
    <div class="p-3">
        <p class="mb-0">Codes are being generated for the following awards.</p>
        <p>You can follow the job process in the terminal with "php artisan queue:listen"</p>

        <ul class="">
            @foreach($awards as $award)
                <li>
                    <strong>{{ $award->name }}</strong> - Stock {{ $award->stock }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection


