<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccommodationType;
use App\Models\Activity;
use App\Models\TransportationType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function indexAccommodation()
    {
        $accommodations = AccommodationType::all();
        return view('admin.accommodations.index', compact('accommodations'));
    }

    public function storeAccommodation(Request $request)
    {
        $request->validate(['type_name' => 'required|string|unique:accommodation_types,type_name']);
        AccommodationType::create(['type_name' => $request->type_name]);

        return redirect()->back()->with(['message' => 'Accommodation added successfully']);
    }

    public function updateAccommodation(Request $request, $id)
    {
        $request->validate(['type_name' => 'required|string|unique:accommodation_types,type_name,' . $id]);

        $accommodation = AccommodationType::findOrFail($id);
        $accommodation->update(['type_name' => $request->type_name]);

        return redirect()->back()->with(['message' => 'Accommodation updated successfully']);
    }

    public function destroyAccommodation($id)
    {
        AccommodationType::destroy($id);
        return redirect()->back()->with(['message' => 'Accommodation deleted successfully']);
    }
    public function indexActivity()
    {
        $activites = Activity::all();
        return view('admin.activities.index', compact('activites'));
    }

    public function storeActivity(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:activities,name']);
        Activity::create(['name' => $request->name]);

        return redirect()->back()->with(['message' => 'Activity added successfully']);
    }

    public function updateActivity(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|unique:activities,name,' . $id]);

        $Activity = Activity::findOrFail($id);
        $Activity->update(['name' => $request->name]);

        return redirect()->back()->with(['message' => 'Activity updated successfully']);
    }

    public function destroyActivity($id)
    {
        Activity::destroy($id);
        return redirect()->back()->with(['message' => 'Activity deleted successfully']);
    }
    public function indextransportation()
    {
        $transportations = TransportationType::all();
        return view('admin.transportations.index', compact('transportations'));
    }

    public function storetransportation(Request $request)
    {
        $request->validate(['type_name' => 'required|string|unique:transportation_types,type_name']);
        TransportationType::create(['type_name' => $request->type_name]);

        return redirect()->back()->with(['message' => 'transportation added successfully']);
    }

    public function updatetransportation(Request $request, $id)
    {
        $request->validate(['type_name' => 'required|string|unique:transportation_types,type_name,' . $id]);

        $transportation = TransportationType::findOrFail($id);
        $transportation->update(['type_name' => $request->type_name]);

        return redirect()->back()->with(['message' => 'transportation updated successfully']);
    }

    public function destroytransportation($id)
    {
        TransportationType::destroy($id);
        return redirect()->back()->with(['message' => 'transportation deleted successfully']);
    }
}
