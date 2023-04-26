<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Mahasiswa::latest()->get();

        try {
            return response()->json([
                'status' => true,
                'message' => 'Data mahasiswa has been retrieved successfully',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateddata = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'date_birth' => 'required',
            'address' => 'required',
        ]);

        $data = Mahasiswa::create($validateddata);

        try {
            return response()->json([
                'status' => true,
                'message' => 'Data mahasiswa has been added!',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
        $data = Mahasiswa::where('id', $mahasiswa->id)->get();

        try {
            return response()->json([
                'status' => true,
                'message' => 'Data mahasiswa has been retrieved successfully',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $validateddata = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'date_birth' => 'required',
            'address' => 'required',
        ]);

        Mahasiswa::where('id', $mahasiswa->id)->update($validateddata);
        $data = Mahasiswa::where('id', $mahasiswa->id)->get();

        try {
            return response()->json([
                'status' => true,
                'message' => 'Data mahasiswa has been updated!',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
        Mahasiswa::destroy($mahasiswa->id);
        return response()->json([
            'status' => true,
            'message' => 'Data mahasiswa has been deleted!',
        ]);
    }
}
