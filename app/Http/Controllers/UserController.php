<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = ['email' => 'required|unique:users', 'password' => 'required|min:6|max:18', 'device_id' => 'required'];

        $v = \Validator::make($request->all(), $rules);

        if ($v->fails()) {

            return Response::json(['error' => true, 'message' => 'Error mas dab']);
        } else {

            $number = '0123456789';
            $code = substr(str_shuffle($number), 0, 6);

            $user = new User;
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->activation_code = $code;
            $user->device_id = $request->input('device_id');
            $user->save();

            $user_id = User::max('id');

            $role = User::find($user_id);
            $role->assignRole('customer');

            $data = ['name' => $request->input('email'), 'code' => $code ];
            $receiver = $request->input('email');

            Mail::send('hello', $data, function ($mail) use ($receiver)
            {
                $mail->to($receiver, 'Me');

                $mail->subject('Silakan aktivasi akun anda');
            });

            return Response::json(['error' => false, 'message' => 'Thank you for registering. We have send code to your email. Please check your email to activate your account.']);
        }
    }

    public function profil()
    {
        $data = User::with('customers')->where('id', \Authorizer::getResourceOwnerId())->first();

        return Response::json(['error' => false, 'data' => $data]);
    }

    public function activate(Request $request)
    {
        $is_exist = User::whereEmail($request->input('email'))->whereActivation_code($request->input('code'))->pluck('id');

        if (empty($is_exist)) {

            return Response::json(['error' => true, 'message' => 'Code is invalid']);
        } else {
            $user = User::find($is_exist);
            $user->activation_code = '';
            $user->status = 'active';
            $user->save();

            return Response::json(['error' => false, 'message' => 'Your account has been activated. You can now login to your account.']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
