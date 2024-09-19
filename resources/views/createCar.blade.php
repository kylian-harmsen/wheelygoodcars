@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="#" method="POST">
            @csrf
            <label>brand:</label>
            <input type="text" name="brand" id="brand">
            <label>model:</label>
            <input type="text" name="model" id="model">
            <label>price:</label>
            <input type="int" name="price" id="price">
            <label>mileage:</label>
            <input type="int" name="mileage" id="mileage">
            <label>seats:</label>
            <input type="int" name="seats" id="seats">
            <label>production year:</label>
            <input type="int" name="production_year" id="production_year">
            <label>color:</label>
            <input type="text" name="color" id="color">
            <label>placeholder:</label>
            <input type="text" name="plc" id="plc">
            <label>placeholder:</label>
            <input type="text" name="plc" id="plc">
            <label>placeholder:</label>
            <input type="text" name="plc" id="plc">
            <button type="submit">Aanmaken</button>
        </form>
    </div>
@endsection
