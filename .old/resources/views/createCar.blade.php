@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <h1>Auto aanbieden</h1>
            <form action="{{ route('cars.offer.step2.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="brand">Kenteken: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="license_plate" placeholder="12-AB-CD" value="{{ session('license_plate') }}" disabled required>
                </div>
                <div class="form-group">
                    <label for="brand">Merk: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="brand" placeholder="Audi, BMW, etc." required>
                </div>
                <div class="form-group">
                    <label for="model">Model: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="model" placeholder="A3, 3-serie, etc." required>
                </div>
                <div class="form-group">
                    <label for="year">Bouwjaar:</label>
                    <input type="number" class="form-control" name="production_year" placeholder="2020">
                </div>
                <div class="form-group">
                    <label for="mileage">Kilometerstand:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kg</span>
                        </div>
                        <input type="number" class="form-control" name="mileage" min="0" placeholder="100000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="doors">Aantal deuren:</label>
                    <input type="number" class="form-control" name="doors" min="2" placeholder="4">
                </div>
                <div class="form-group">
                    <label for="seats">Aantal zitplaatsen:</label>
                    <input type="number" class="form-control" name="seats" min="2" placeholder="5">
                </div>
                <div class="form-group">
                    <label for="weight">Gewicht:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kg</span>
                        </div>
                        <input type="number" class="form-control" name="weight" min="0" placeholder="1500">
                    </div>
                </div>
                <div class="form-group">
                    <label for="color">Kleur:</label>
                    <input type="text" class="form-control" name="color" placeholder="Zwart, wit, etc.">
                </div>
                <div class="form-group">
                    <label for="price">Prijs:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">&euro;</span>
                        </div>
                        <input type="number" class="form-control" name="price" min="0" step="0.01" placeholder="25000">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Opslaan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>

@endsection
