<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\BukuInduk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BukuIndukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukuInduk = BukuInduk::all();
        return response()->json($bukuInduk, Response::HTTP_OK);
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
            $validator = validator::make($request->all(), [
                'No_Induk' => 'required|Numeric',
                'Judul' => 'required',
                'Klasifikasi' => 'required',
                'NamaPengarang'  => 'required',
                'TempatTerbit' => 'required',
                'JumlahBuku' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            BukuInduk::create($request->all());
            $response = [
                'Success' => 'New BukuInduk Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($NoInduk)
    {
        try {
            $bukuInduk = BukuInduk::findOrFail($NoInduk);
            $response = [
                $bukuInduk
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuInduk $bukuInduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NoInduk)
    {
        try {
            $bukuInduk = BukuInduk::findOrFail($NoInduk);
            $validator = Validator::make($request->all(), [
                'No_Induk' => 'required|Numeric',
                'Judul' => 'required',
                'Klasifikasi' => 'required',
                'NamaPengarang'  => 'required',
                'TempatTerbit' => 'required',
                'JumlahBuku' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['succeed' => false, 'Message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $bukuInduk->update($request->all());
            $response = [
                'Success' => 'Buku Induk Updated'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'no result',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NoInduk)
    {
        try {
            BukuInduk::findOrFail($NoInduk)->delete();
            return response()->json(['success' => 'Buku Induk deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
