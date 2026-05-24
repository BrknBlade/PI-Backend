<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCutTypeRequest;
use App\Http\Requests\UpdateCutTypeRequest;
use App\Http\Resources\CutTypeResource;
use App\Models\CutType;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\json;

class CutTypeController extends Controller
{

    public function index()
{
    return CutTypeResource::collection(CutType::all());
}

    public function store(CreateCutTypeRequest $request)
    {
        if (Auth::user()->cannot('create', CutType::class)) {
            return response()->json([
                'message' => "You cannot perform this action"
            ], 401);
        }

        if (!CutType::create($request->validated())) {
            return response()->json([
                'message' => "Fallo al crear el corte de pelo"
            ]);
        }

        return response()->json([
            'message' => "corte de pelo creado con exito"
        ]);
    }

    public function show(CutType $cutType)
    {
        if (Auth::user()->cannot('view', $cutType)) {
            return response()->json([
                'message' => "You cannot perform this action"
            ], 401);
        }

        return new CutTypeResource($cutType);
    }

    public function update(UpdateCutTypeRequest $request, CutType $cutType)
    {
        
        if (Auth::user()->cannot('update', $cutType)) {
            return response()->json([
                'message' => "You cannot perform this action"
            ], 401);
        }

        $cutType->update($request->validated());

        return response()->json([
            'message' => 'Se ha actualizado el corte satisfactoriamente'
        ]);
    }

    public function destroy(CutType $cutType)
    {
        if (Auth::user()->cannot('delete', $cutType)) {
            return response()->json([
                'message' => "You cannot perform this action"
            ], 401);
        }

        $cutType->delete();

        return response()->json([
            "message" => "Se ha eliminado el tipo de corte con exito"
        ]);
    }
}
