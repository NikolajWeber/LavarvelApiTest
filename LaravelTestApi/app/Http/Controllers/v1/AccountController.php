<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', []);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Account::with('transactions')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        return Account::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Account::with('transactions')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $account = Account::findOrFail($id);
        $account->update($request->all());
        return response()->json($account, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->transactions()->delete();
        $account->delete();
        return response()->json(null, 204);
    }
}
