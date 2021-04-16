@extends('layouts.layout')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        <div class="title m-b-md">
            Pizza List
        </div>
        {{-- write vanilla php in blade --}}
        {{-- @php
                $name = "ninja";
                echo($name);
            @endphp --}}

        {{-- loop --}}
        {{-- @for ($i = 0; $i < count($pizzas); $i++)
                <p>{{ $pizzas[$i]['type'] }}</p>
            @endfor --}}

        <p>{{ $name }} - {{ $age }}</p>
        @foreach ($pizzas as $pizza)
            <div>{{ $pizza->name }} - {{ $pizza->type  }} -{{ $pizza->base }}</div>
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
</div>
@endsection
