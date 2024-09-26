<!-- resources/views/layouts/aanbod-plaatsen.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Aanbod Plaatsen</h1>

    <!-- Form to submit data -->
    <form action="{{ route('aanbod.submit') }}" method="POST">
        @csrf
        <input type="text" name="license_plate" placeholder="Kentekenplaat" required>
        <button type="submit">Submit</button>
    </form>
@endsection
