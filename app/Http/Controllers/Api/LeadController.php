<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        // $form_data = $request->validated();
        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['nullable'],
            'message' => ['required'],
        ]);
        if($validator->fails()) {
            return response()->json([
                'succes' => false,
                'error' => $validator->errors()
            ]);
        }

        $lead = new Lead();
        $lead->fill($form_data);
        $lead->save();

        return response()->json([
        'success' => true,
        ]);
        }
}
