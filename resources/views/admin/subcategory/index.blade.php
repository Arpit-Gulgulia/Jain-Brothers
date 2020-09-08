@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="width: 18rem;">
        @if(count($subcategories) > 0)
            <div class="card-header">
                Subcategory Found in database
            </div>
            <ul class="list-group list-group-flush">
                @foreach($subcategories as $subcategory)
                    <li class="list-group-item">{{ $subcategory }}</li>
                @endforeach
            </ul>
        @else
            No Subcategory found in database!
        @endif

    </div>
@endsection
