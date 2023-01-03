<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Budget;
use Laravel\Lumen\Routing\Controller as BaseController;

class BudgetController extends BaseController
{
    /**
     *  Create new data for budget.
     *
     */
    public function create(Request $request) 
    {
        $data = $request->all();
        $budget = Budget::create($data);
        
        return response()->json($budget);
    }

    /**
     *  Retrieve data budget.
     * 
     */
    public function listBudget() {
        $data = Budget::get();
        return response()->json(['message' => 'SUCCESS', 'data' => $data]);
    }
}
