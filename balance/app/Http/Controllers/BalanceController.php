<?php

namespace App\Http\Controllers;

use App\Models\Balance;

class BalanceController extends Controller
{
    public function userBalance(array $params)
    {
        return Balance::with('user')->where('user_id', $params['user_id'])->take(1)->get();
    }

  public function history(array $params)
  {
      return Balance::where('user_id', $params['user_id'])->orderByDesc('created_at')->take($params['limit'])->get();
  }
}
