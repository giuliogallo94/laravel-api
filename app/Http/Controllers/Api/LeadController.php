<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadEmail;

class LeadController extends Controller {
    public function store(Request $request) {
        $form_data = $request->all();

        // Impostiamo la validazione
        $validator = Validator::make(
            $form_data,
            [
                'name' => ['required'],
                'lastname' => ['required'],
                'email' => ['required', 'email'],
                'phone_number' => ['nullable'],
                'message' => ['required']
            ],
            [
                'name.required' => 'Il nome è richiesto'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);
        }

        // Se la validazione passa, salviamo dati nel database
        $lead = new Lead();
        $lead->fill($form_data);
        $lead->save();

        // Inviare email
        Mail::to('admin@boolpress.com')->send(new NewLeadEmail($lead));

        return response()->json([
            'success' => true,
        ]);
    }
}

