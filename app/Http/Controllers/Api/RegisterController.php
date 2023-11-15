<?php

namespace App\Http\Controllers\Api;

use App\Models\Keanggotaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'NIS'       => 'required',
            'Nama'      => 'required',
            'Kelas'     => 'required',
            'Password'  => 'required|min:8|confirmed'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $keanggotaan = Keanggotaan::create([
            'NIS'      => $request->nis,
            'Nama'      => $request->nama,
            'Kelas'      => $request->kelas,
            'Password'  => bcrypt($request->password)
        ]);

        //return response JSON user is created
        if($keanggotaan) {
            return response()->json([
                'success' => true,
                'keanggotaan'    => $keanggotaan,
            ], 201);
        }

        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}
