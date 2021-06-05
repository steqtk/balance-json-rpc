<?php

namespace App\Services;

use App\Http\Controllers\BalanceController;
use ErrorException;
use Illuminate\Http\Request;
use App\Responses\JsonRpcResponse;

class JsonRpcServer
{
    public function handle(Request $request, BalanceController $controller)
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new ErrorException('Parse error');
            }
            $result = $controller->{str_replace('balance.', '', $content['method'])}(...[$content['params']]);

            return JsonRpcResponse::success($result, $content['id']);
        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
