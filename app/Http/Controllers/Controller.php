<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkCoordinatorAuthorization($request) {
        if($request->authorized_accountant == 'autorizado') {
            $request->authorize_coordinator = 'autorizado';
            $request->status = 'autorizado';
            $request->save();

            return 'authorized';

        }else {
            $request->authorize_coordinator = 'autorizado';
            $request->status = 'no-autorizado';
            $request->save();
        }
    }

    public function checkAccountantAuthorization($request) {
        if($request->authorized_coordinator == 'autorizado') {
            $request->authorize_accountant = 'autorizado';
            $request->status = 'autorizado';
            $request->save();

            return 'authorized';

        }else {
            $request->authorize_accountant = 'autorizado';
            $request->status = 'no-autorizado';
            $request->save();
        }
    }
}
