<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Wallet;
use Laravel\Lumen\Routing\Controller as BaseController;

class WalletController extends BaseController
{
    public function __construct()
    {
        //
    }
    
    /**
     *  Create new data wallet.
     *
     *  @param \Illuminate\Http\Request request
     *  
     */
    public function create(Request $request) 
    {
        $wallet_request = $request->all();
        $budget = Wallet::create($wallet_request);
        
        return response()->json($budget);
    }

    /**
     *  Retrieve data wallet.
     * 
     */
    public function listWallet() 
    {
        $data = Wallet::get();
        return response()->json(['code'=> '200', 'message' => 'SUCCESS', 'data' => $data], 200);
    }

    /**
     * Update data on wallet.
     * 
     * @param \Illuminate\Http\Request request
     * @param id
     */
    public function update(Request $request) 
    {
        if ($request->id == null) {
            return response()->json(['code' => 400,'message' => 'ID MUST NOT BE NULL'], 400);
        }

        $walletExist = Wallet::find($request->id);

        if (!($walletExist)) {
            return response()->json(['code'=> 404, 'message' => 'DATA NOT FOUND'], 404);
        }

        $requestWallet = $request->all();
        $walletExist->fill($requestWallet);
        $walletExist->save();

        return response()->json(['message' => 'SUCCESS']);
    }

    /**
     * delete data existing wallet, (soft delete).
     * 
     * @param \Illuminate\Http\Request request
     * @param id
     */
    public function delete(Request $request) 
    {
        if ($request->id == null) {
            return response()->json(['message' => 'ID MUST NOT BE NULL'], 400);
        }

        $walletExist = Wallet::find($request->id);

        if (!($walletExist)) {
            return response()->json(['message' => 'DATA NOT FOUND'], 404);
        }

        $requestWallet = $request->all();
        $walletExist->fill($requestWallet);
        $walletExist->save();

        return response()->json(['message' => 'SUCCESS']);
    }
}
