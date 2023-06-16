<?php
// recu uf3leo wiesner
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;

class VehiculosController extends Controller
{
    // Método para insertar vehículos
    public function insertar(Request $request)
    {
        // Iniciar la transacción
        DB::beginTransaction();

        try {
            // Creamos un  nuevo vehiculo
            $vehiculo = new Vehiculo();
            $vehiculo->matricula = $request->matricula;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->potencia = $request->potencia;
            $vehiculo->save();

            // Confirmacion del la transact
            DB::commit();

            return response()->json(['message' => 'Vehículo insertado con éxito'], 200);
        } catch (\Exception $e) {
            // Si hay error, revierte la transacción
            DB::rollback();

            return response()->json(['message' => 'Error al insertar vehículo'], 500);
        }
    }

    // Método para eliminar vehículos
    public function eliminar($id)
    {
            // Confirmacion del la transact
            DB::beginTransaction();

        try {
            // Buscar vehiculo por ID y eliminar
            $vehiculo = Vehiculo::findOrFail($id);
            $vehiculo->delete();

            // Confirmar transaccion
            DB::commit();

            return response()->json(['message' => 'Vehículo eliminado con éxito'], 200);
        } catch (\Exception $e) {
            // Si hay error, revierte la transaccion
            DB::rollback();

            return response()->json(['message' => 'Error al eliminar vehículo'], 500);
        }
    }
}
