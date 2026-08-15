<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Inquiry;

class PublicController extends Controller
{
    public function index()
    {
        $featuredCars = Car::where('is_featured', true)->where('status', 'available')->take(6)->get();
        return view('welcome', compact('featuredCars'));
    }

    public function inventory(Request $request)
    {
        $query = Car::where('status', 'available');

        // Filters
        if($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
                $q->where('brand', 'like', '%'.$request->keyword.'%')
                  ->orWhere('model', 'like', '%'.$request->keyword.'%')
                  ->orWhere('year', 'like', '%'.$request->keyword.'%');
            });
        }

        
        if($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }

        if($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }


        $cars = $query->latest()->paginate(12);

        return view('inventory', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('car-details', compact('car'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function sendInquiry(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $validated['user_id'] = auth()->id(); // Nullable

        Inquiry::create($validated);

        return back()->with('success', 'Your inquiry has been sent successfully! We will contact you soon.');
    }
}
