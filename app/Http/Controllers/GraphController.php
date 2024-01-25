<?php

namespace App\Http\Controllers;

use App\Egress;
use App\Income;
use App\Ingreso_Detalle;
use App\Salida_Detalle;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function get_bar_chart(){
        $incomes = collect([]);
        $egresses = collect([]);
        for ($i=1; $i<=12; $i++){
           // $i= 2;
            $month_income = $this->get_income_month($i);
            $month_egress = $this->get_egress_month($i);
            $incomes->push($month_income);
            $egresses->push($month_egress);
       }

        return response()->json([
            'incomes' => $incomes,
            'egresses' => $egresses,
            'total_incomes' => $incomes->sum(),
            'total_egresses' => $egresses->sum(),
        ]);
    }

    private function get_income_month($mes){
        $mesactual = date($mes);
        $total = Ingreso_Detalle::whereMonth('created_at', '=', $mesactual)->get()->sum('subtotal');
       
        return $total;
    }
    private function get_egress_month($mes){
        $mesactual = date($mes);
        $total = Salida_Detalle::whereMonth('created_at', '=', $mesactual)->get()->sum('subtotal');
        return $total;
    }
}
