<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $carsCount = Car::count();
        $inquiriesCount = Inquiry::where('status', 'pending')->count();
        $usersCount = User::where('role', 'user')->count();
        $recentCars = Car::latest()->take(5)->get();
        return view('admin.dashboard', compact('carsCount', 'inquiriesCount', 'usersCount', 'recentCars'));
    }

    /**
     * Display a listing of the resource (Cars).
     */
    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:'.(date('Y')+1),
            'price' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|string',
            'transmission' => 'required|string',
            'body_type' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePaths = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('cars', 'public');
                array_unshift($imagePaths, $path); // Prepend so it shows first
            }
        }

        $car = new Car($request->except('images'));
        $car->images = $imagePaths;
        $car->is_featured = $request->has('is_featured');
        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Vehicle and images have been added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'fuel_type' => 'required|string',
            'transmission' => 'required|string',
            'body_type' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $car->fill($request->except(['images', 'status', 'is_featured']));
        $car->is_featured = $request->has('is_featured');

        if($request->hasFile('images')) {
            $currentImages = $car->images;
            if (!is_array($currentImages)) {
                $currentImages = [];
            }
            
            foreach($request->file('images') as $image) {
                $path = $image->store('cars', 'public');
                array_unshift($currentImages, $path); // Newest image at the front
            }
            
            // Safety filter: ensure all items are strings before unique check
            $cleanImages = array_filter($currentImages, function($img) {
                return is_string($img);
            });
            
            $car->images = array_values(array_unique($cleanImages));
        }


        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Vehicle details and images have been edited successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully!');
    }

    public function inquiries()
    {
        $inquiries = Inquiry::with('car')->latest()->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function approveUser(User $user)
    {
        $user->update([
            'is_approved' => true,
            'email_verified_at' => $user->email_verified_at ?? now(),
        ]);

        // Send Email
        try {
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\UserApprovedMail($user));
        } catch (\Exception $e) {
            // Log error but continue
            \Illuminate\Support\Facades\Log::error("Email failed for user {$user->id}: " . $e->getMessage());
        }

        return back()->with('success', "User {$user->name} has been approved and notified.");
    }


    public function removeImage(Car $car, $index)
    {
        $images = $car->images;
        
        if (isset($images[$index])) {
            $imagePath = $images[$index];
            
            // Remove from array
            unset($images[$index]);
            $car->images = array_values($images);
            $car->save();
            
            // Delete actual file if it's not a URL
            if (!str_starts_with($imagePath, 'http')) {
                Storage::disk('public')->delete($imagePath);
            }
            
            return back()->with('success', 'Image removed successfully.');
        }
        
    }

    public function updateInquiryStatus(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,resolved'
        ]);

        $inquiry->update($validated);


        return response()->json(['success' => true]);
    }
}



