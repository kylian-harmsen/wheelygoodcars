@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Aanbod</title>
    <style>
        .car-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            cursor: pointer; /* Maakt de div klikbaar */
            text-decoration: none; /* Geen onderstreping op de link */
            color: inherit; /* Verander de kleur van de link niet */
            display: block; /* Zorgt ervoor dat de gehele div klikbaar is */
        }
        .car-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .car-details {
            margin-top: 10px;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .delete-button:hover {
            background-color: darkred;
        }

    </style>
</head>
<body>
<h1>Mijn Aanbod</h1>

@foreach ($cars as $car)
    <!-- Klikbare link naar de bewerkpagina -->
    <a href="{{ route('auto.edit', $car->id) }}" class="car-card">
        <!-- Display Car Image -->
        @if($car->image)
            <img src="{{ $car->image }}" alt="Car Image">
        @else
            <img src="/images/default-car.jpg" alt="Default Car Image">
        @endif

        <!-- Car Details -->
        <div class="car-details">
            <h2>{{ $car->brand }} - {{ $car->model }}</h2>
            <p>Kenteken: {{ $car->license_plate }}</p>
            <p>Kilometerstand: {{ $car->mileage }} km</p>
            <p>Prijs: €{{ number_format($car->price, 2) }}</p>
            <p>Kleur: {{ $car->color }}</p>
            <p>Bouwjaar: {{ $car->production_year }}</p>
        </div>
    </a>

    <!-- Verwijder-knop alleen voor eigenaar -->
    <form action="{{ route('auto.delete', $car->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">Verwijderen</button>
    </form>
@endforeach

</body>
</html>
@endsection
