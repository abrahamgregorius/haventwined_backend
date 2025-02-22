<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = Info::first();
        return response()->json($info);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        $info = Info::first();

        $info->update($request->all());

        return response()->json([
            'message' => 'Info updated succesfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        //
    }
}
