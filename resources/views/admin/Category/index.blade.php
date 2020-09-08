@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="width: 18rem;">
        @if(count($categories) > 0)
            <div class="card-header">
                Category Found in database
            </div>
            <ul class="list-group list-group-flush">
                @foreach($categories as $category)
                    <li class="list-group-item">{{ $category }}</li>
                @endforeach
            </ul>
        @else
            No Category found in database!
        @endif

    </div>
@endsection
