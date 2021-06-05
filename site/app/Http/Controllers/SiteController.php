<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Services\JsonRpcClient;

class SiteController extends Controller
{
    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param BalanceRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(BalanceRequest $request)
    {
        $balance = $this->client->send('balance.userBalance', ['user_id' => $request->get('user_id')]);
        $history = $this->client->send(
            'balance.history',
            ['user_id' => $request->get('user_id'), 'limit' => $request->get('limit')]
        );

        return view('show', ['balance' => $balance, 'history' => $history]);
    }
}
