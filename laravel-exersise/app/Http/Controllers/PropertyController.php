<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        if($properties -> count() > 0){
            return response()->json([
                'status' => 200,
                'properties' => $properties
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Properties Found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'price' => 'required',
            'type' => 'required|in:apartment,villa,townhouse',
            'status' => 'required|in:sold,leased,available'
          ]);

        $property = Property::create([
            'title' => $request->title,
            'address' => $request->address,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'type' => $request->type,
            'status' => $request->status
        ]);

        if($property){
            return response()->json([
                'status' => 200,
                'message' => "Property Created Successfully"
            ], 200);
        } 
        
    }

    public function show($id)
    {
        $property = Property::find($id);
        if($property){
            return response()->json([
                'status' => 200,
                'property' => $property
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Property Not Found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $property = Property::find($id);
        if($property){
            return response()->json([
                'status' => 200,
                'property' => $property
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Property Not Found'
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $property = Property::find($id);
        if($property){
            $property ->update([
                'title' => $request->title,
                'address' => $request->address,
                'price' => $request->price,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'type' => $request->type,
                'status' => $request->status
            ]);
            return response()->json([
                'status' => 200,
                'message' => "Property Updated Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Property Not Found"
            ], 404);
        } 
        
    }

    public function destroy($id)
    {
        $property = Property::find($id);
        if($property){
            $property->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Property Deleted Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Property Not Found'
            ], 404);
        }
    }

}