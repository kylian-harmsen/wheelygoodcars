<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function offerStep1()
    {
        // Laat het formulier zien met de input voor het kenteken
        return view('cars.offer.step1');
    }

    public function processStep1(Request $request){
        // Valideer het formulier. Is het kenteken wel een kenteken?
        $request->validate([
            'license_plate' => 'required|regex:/^[A-Z0-9-]{6,10}$/'
        ]);

        // Optioneel: een volledige validatie van het kenteken
        // if(!$this->checkLicensePlate($request->license_plate)){
        //     return redirect()->back()->with('error', 'Dit kenteken is niet geldig. Probeer een ander kenteken.');
        // }

        // Check of het kenteken al bestaat in de database
        if(Car::where('license_plate', $request->license_plate)->exists()){
            return redirect()->back()->with('error', 'Een auto met dit kenteken bestaat al. Probeer een ander kenteken.');
        }

        // Sla het kenteken op in de sessie zodat we het kunnen gebruiken in stap 2
        $request->session()->put('license_plate', $request->license_plate);

        // Ga naar stap 2
        return redirect()->route('cars.offer.step2');
    }

    public function offerStep2()
    {
        // Laat het formulier zien met de input voor de overige gegevens
        return view('cars.offer.step2');
    }

    public function processStep2(Request $request){

        // Valideer het formulier
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'seats' => 'nullable|numeric',
            'doors' => 'nullable|numeric',
            'production_year' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'color' => 'nullable',
        ]);

        // Sla de auto op in de database
        $car = new Car();
        $car->license_plate = $request->session()->get('license_plate');
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->price = $request->price;
        $car->mileage = $request->mileage;
        $car->seats = $request->seats;
        $car->doors = $request->doors;
        $car->production_year = $request->production_year;
        $car->weight = $request->weight;
        $car->color = $request->color;
        $car->user_id = auth()->id();
        $car->save();

        // Verwijder het kenteken uit de sessie
        $request->session()->forget('license_plate');

        // Ga terug naar de homepagina
        return redirect()->route('home')->with('success', 'De auto is succesvol aangeboden.');
    }

    public function checkLicensePlate($license_plate) {
        // Check met regex of het kenteken een geldig Nederlands kenteken is
        $patterns = [
            '/^[a-zA-Z]{2}[d]{2}[d]{2}$/', // 1 XX-99-99
            '/^[d]{2}[d]{2}[a-zA-Z]{2}$/', // 2 99-99-XX
            '/^[d]{2}[a-zA-Z]{2}[d]{2}$/', // 3 99-XX-99
            '/^[a-zA-Z]{2}[d]{2}[a-zA-Z]{2}$/', // 4 XX-99-XX
            '/^[a-zA-Z]{2}[a-zA-Z]{2}[d]{2}$/', // 5 XX-XX-99
            '/^[d]{2}[a-zA-Z]{2}[a-zA-Z]{2}$/', // 6 99-XX-XX
            '/^[d]{2}[a-zA-Z]{3}[d]{1}$/', // 7 99-XXX-9
            '/^[d]{1}[a-zA-Z]{3}[d]{2}$/', // 8 9-XXX-99
            '/^[a-zA-Z]{2}[d]{3}[a-zA-Z]{1}$/', // 9 XX-999-X
            '/^[a-zA-Z]{1}[d]{3}[a-zA-Z]{2}$/', // 10 X-999-XX
            '/^[a-zA-Z]{3}[d]{2}[a-zA-Z]{1}$/', // 11 XXX-99-X
            '/^[a-zA-Z]{1}[d]{2}[a-zA-Z]{3}$/', // 12 X-99-XXX
            '/^[d]{1}[a-zA-Z]{2}[d]{3}$/', // 13 9-XX-999
            '/^[d]{3}[a-zA-Z]{2}[d]{1}$/', // 14 999-XX-9
        ];

        // loop door alle patronen heen en kijk of het kenteken matcht
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $license_plate)) {
                return true;
            }
        }

        // Als geen enkel patroon matcht, is het kenteken niet geldig
        return false;
    }
}
