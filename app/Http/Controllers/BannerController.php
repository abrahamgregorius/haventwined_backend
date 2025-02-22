<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::get();

        return response()->json(
            [
                'banners' => $banners->map(function ($banner) {
                    return [
                        'id' => $banner->id,
                        'name' => $banner->name,
                        'asset' => asset($banner->asset),
                    ];
                })
            ]
        );
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z0-9._]+$/',
            'asset' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Invalid field",
                'errors' => $validator->errors()
            ], 422);
        }

        $time = new DateTime();
        $timestamp = $time->getTimestamp();

        if ($request->hasFile('asset')) {
            $file = $request->file('asset');
            $file->move(public_path() . "/banners/", "$timestamp.png");
        }

        $data = $request->all();
        $data['asset'] = "/banners/$timestamp.png";

        $banner = Banner::create($data);

        return response()->json([
            'message' => 'Banner created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return response()->json([
            'id' => $banner->id,
            'name' => $banner->name,
            'asset' => asset($banner->asset),
            'created_at' => $banner->created_at,
            'updated_at' => $banner->updated_at,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->all();
        
        if ($request->hasFile('asset')) {
            $file = $request->file('asset');
            $time = new DateTime();
            $timestamp = $time->getTimestamp();

            $file->move(public_path() . "/banners/", "$timestamp.png");
            $data['asset'] = "/banners/$timestamp.png";
        }

        $banner->update($data);

        return response()->json([
            'message' => "Banner updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json([
            'message' => "Banner deleted successfully"
        ]);
    }
}
