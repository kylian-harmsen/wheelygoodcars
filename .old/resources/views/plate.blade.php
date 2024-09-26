@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Auto aanbieden</h1>
            <form action="{{ route('cars.offer.step1.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="brand">Kenteken: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="license_plate" placeholder="12-AB-CD">
                </div>
                <div class="form-group">
                    <input type="submit" value="Volgende" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
@endsection
