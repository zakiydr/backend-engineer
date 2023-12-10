<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request) {
        $patients = Patient::all();

        //Query parameters
        $name = $request->query('name');
        $address = $request->query('address');
        $status = $request->query('status');
        $sort = $request->query('sort');
        $order = $request->query('order');

        // Create an array of the query parameters
        $parameters = [
            'name' => $name,
            'address' => $address,
            'status' => $status,
        ];

        // Looping to do filtering parameters array
        $patients = Patient::query();
        foreach ($parameters as $key => $value) {
            if ($value) {
                $patients = $patients->where($key, 'like', '%'.$value.'%');
            }
        }

        // Sorting data
        if ($sort){
            $patients = Patient::orderBy($sort, $order ?? 'asc');
        } else {
            $patients;
        }

        $patients = $patients->get();

        if ($patients) {
            $data = [
                'message' => 'Get patients Successfully',
                'data' => $patients

            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Get patients Failed',

            ];

            return response()->json($data, 404);
        }
    }
    public function store(Request $request){
        $input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at,
        ];

        $patient = Patient::create($input);

        if ($patient) {
            $data = [
                'message' => 'Create patient Successfully',
                'data' => $patient

            ];

            return response()->json($data, 201);
        } else {
            $data = [
                'message' => 'Create patient Failed',

            ];

            return response()->json($data, 404);
        }
    }
    public function show(Request $request, $id){
        $patient = Patient::find($id);

        if ($patient) {
            $data = [
                'message' => 'Patient updated successfully',    
                'data' => $patient

            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Create patient Failed',

            ];

            return response()->json($data, 404);
        }
    }
    public function update(Request $request, $id){
        $patient = Patient::find($id);

        $input = [
            'name' => $request->name ?? $patient->name,
            'phone' => $request->phone ?? $patient->phone,
            'address' => $request->address ?? $patient->address,
            'status' => $request->status ?? $patient->status,
            'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
            'out_date_at' => $request->out_date_at ?? $patient->out_date_at,
        ];

        $patient->update($input);

        if ($patient) {
            $data = [
                'message' => 'Patient updated successfully',
                'data' => $patient

            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Patient not found',

            ];

            return response()->json($data, 404);
        }
    }
    public function destroy(Request $request, $id){
        $patient = Patient::find($id);

        if ($patient) {

            $patient->delete();
            $data = [
                'message' => 'Patient deleted',
                'data' => $patient

            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Patient not found',

            ];

            return response()->json($data, 404);
        }
    }

}

