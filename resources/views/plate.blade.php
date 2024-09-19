@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="#" method="POST">
            @csrf
            <label>license_plate:</label>
            <input type="text" name="license_plate" id="license_plate">
            <button type="submit">Aanmaken</button>
        </form>
    </div>
@endsection
