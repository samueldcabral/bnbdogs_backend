<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Service::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'description' => 'required|max:255',
            'price' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()
            ->json(['message' => 'Validation failed'], 403);
        } else {
            Service::create($request->all());
            return response()
            ->json(['message' => 'Service created'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $service = Service::findOrFail($service->id);
        return $service;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::findOrFail($service->id);
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = Validator::make($request->all(), [
            'description' => 'required|max:255',
            'price' => 'required',
        ]);
        
        if ($validatedData->fails()) {
            return response()
            ->json(['message' => 'Validation failed'], 403);
        } else {
            Service::whereId($service->id)->update($request->all());
            return response()
            ->json(['message' => 'Service updated'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service = Service::findOrFail($service->id);
        $service->delete();

        return response()->json(['message' => 'Service deleted'], 200);
    }
}
