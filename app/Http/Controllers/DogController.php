<?php

namespace App\Http\Controllers;

use App\Dog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Dog::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dog.create');
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
            'name' => 'required|max:255',
            'weight' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()
            ->json(['message' => 'Validation failed'], 403);
        } else {
            Dog::create($request->all());
            return response()
            ->json(['message' => 'Dog created'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        $dog = Dog::findOrFail($dog->id);
        return $dog;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        $dog = Dog::findOrFail($dog->id);
        return view('dog.edit', compact('dog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'weight' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()
            ->json(['message' => 'Validation failed'], 403);
        } else {
            Dog::whereId($dog->id)->update($request->all());
            return response()
            ->json(['message' => 'Dog updated'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog = Dog::findOrFail($dog->id);
        $dog->delete();

        return response()->json(['message' => 'Dog deleted'], 200);
    }

    public function findDogByUser(User $user)
    {
        $user = User::findOrFail($user->id);
        
        $userDogs = Dog::all()
            ->where('user_id', $user->id);
       
        return $userDogs ? $userDogs : 'Not Found';
    }

}
