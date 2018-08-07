<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Color;
use App\Brand;
use App\RegisteredCar;
use App\User;




class CarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::orderBy('color')->get();
        $brands = Brand::orderBy('name')->get();

        if ( Auth::user()->is_admin) {
            $cars = RegisteredCar::all();
            $users = User::orderBy('name')->get();
            return view('admin', ['colors' => $colors, 'brands' => $brands, 'cars' => $cars, 'users' => $users]);
        } else {
            $cars = RegisteredCar::where('user_id', Auth::user()->id)->get();
            return view('home', ['colors' => $colors, 'brands' => $brands, 'cars' => $cars]);
        }
    }

    public function addCar(Request $request)
    {
        //dd($request);
        if ( Auth::user()->is_admin) {
            
            $this->validate($request, [
                                        'user'  => 'required',
                                        'brand' => 'required',
                                        'color' => 'required',
                                        'state_number' => 'unique:registered_cars'
                                        ]);
        } else {
           
            $this->validate($request, [
                                        'brand' => 'required',
                                        'color' => 'required',
                                        'state_number' => 'unique:registered_cars'
                                        ]);
        }

        $car = new RegisteredCar;
        $car->user_id = Auth::user()->is_admin ? $request->user : Auth::user()->id;
        $car->brand_id = $request->brand;
        $car->color_id = $request->color;
        $car->state_number = $request->state_number;
        $car->save();
        
        return redirect()->back();
        
    }

    public function deleteCar($id)
    {
        $car = RegisteredCar::find($id);
        if ($car->user_id === Auth::user()->id || Auth::user()->is_admin) {
            $car->delete();
        }

        return redirect()->back();

    }
}
