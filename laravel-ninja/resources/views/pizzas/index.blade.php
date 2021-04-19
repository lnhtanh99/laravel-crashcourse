@extends('layouts.app')

@section('content')
    <div class="wrapper pizza-index">
        <h1>Pizza Orders</h1>
        {{-- write vanilla php in blade --}}
        {{-- @php
                $name = "ninja";
                echo($name);
            @endphp --}}

        {{-- loop --}}
        {{-- @for ($i = 0; $i < count($pizzas); $i++)
                <p>{{ $pizzas[$i]['type'] }}</p>
            @endfor --}}

        {{-- <p>{{ $name }} - {{ $age }}</p> --}}
        @foreach ($pizzas as $pizza)
            <div class="pizza-item">
                <img src="/img/pizza.png" alt="pizza">
                <h4><a href="/pizzas/{{ $pizza->id }}">{{ $pizza->name }}</a></h4>
            </div>
            {{-- if-else  statement in blade --}}
            {{-- @if ($pizza->price >= 15)
                    <p>This is a modern pizza</p>
                @elseif ($pizza->price <= 5) 
                    <p>This is a kid pizza</p>
                @else
                    <p>This is a classic pizza</p>
                @endif --}}
        @endforeach
</div>
@endsection
