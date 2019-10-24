<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCreateRequest;
use App\Notifications\NewMoneyRequest;
use App\Request as AppRequest;
use App\User;
use Illuminate\Http\Request;
use \Validator;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\ResponsePython
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneyRequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $moneyRequest = AppRequest::create([
            'concept'                   => $request->concept,
            'description'               => $request->description,
            'amount'                    => $request->amount,
            'authorized_coordinator'    => 'no-autorizado',
            'authorized_accountant'     => 'no-autorizado',
            'status'                    => 'no-autorizado',
            'user_id'                   => \Auth::user()->id     
        ]);
        
        if($moneyRequest) {
            return redirect()->route('request.pendientes')->with([
                'message_success'  => 'La solicitud se creo correctamente. Espera a que sea autorizada.'
            ]);
        }

        return redirect()->route('request.pendientes')->with([
            'message_error'  => 'La solicitud no se creo correctamente. Intenta mas tarde.'
        ]);
    }

    public function accountantAuthorizeRequest($id){
        // Validar que pertenezcan a la misma región
        // Validar que el usuario sea un contador

        $request = AppRequest::find($id);

        if($this->checkAccountantAuthorization($request) == 'authorized') {
            return redirect()->route('request.authorize')->with([
                'message'  => 'La solicitud de autorizo correctamente por el contador.'
            ]);
        }

        return redirect()->route('request.authorize')->with([
            'message'  => 'La solicitud no se pudo autorizar, intenta mas tarde.'
        ]);
    }

    public function coordinatorAuthorizeRequest($id){
        // Validar que pertenezcan a la misma región
        // Validar que el usuario sea un coordinador

        $request = AppRequest::find($id);

        if($this->checkCoordinatorAuthorization($request) == 'authorized') {
            return redirect()->route('request.authorize')->with([
                'message'  => 'La solicitud de autorizo correctamente por el coordinador.'
            ]);
        }

        return redirect()->route('request.authorize')->with([
            'message'  => 'La solicitud no se pudo autorizar, intenta mas tarde.'
        ]);

    }

    public function solicitudesPendientes(){
        $authUser = \Auth::user();

        $moneyRequests = AppRequest::where('user_id', $authUser->id)
            ->where('authorized_coordinator', 'no-autorizado')
                ->orWhere('authorized_accountant', 'no-autorizado')
                    ->get();

        return view('moneyRequest.pendientes', [
            'moneyRequests' => $moneyRequests
        ]);
    }

    public function solicitudesAprobadas(){
        $authUser = \Auth::user();

        $moneyRequests = AppRequest::where('user_id', $authUser->id)
            ->where('authorized_coordinator', 'autorizado')
                ->orWhere('authorized_accountant', 'autorizado')
                    ->get();

        return view('moneyRequest.aprobadas', [
            'moneyRequests'  => $moneyRequests
        ]);
    }

    public function autorizarSolicitudes(){
        $authUser = \Auth::user();

        $moneyRequests = AppRequest::where('user_id', $authUser->id)
            ->where('status', 'no-autorizado')
                ->get();

        return view('moneyRequest.autorizar', [
            'moneyRequests' => $moneyRequests
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
