<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('/users/select',['users' => $users]);
    }
    public function telaLogin(){
        $users = User::all();
        return view('/login',['users' => $users]);

    }
    public function login(Request $request){
        $users = User::all();
        foreach ($users as $user) {
            $accessName = $user['access_name'];
            $password = $user['password'];
            $isAdm = $user['adm'];
            if(($accessName == $request->access_name) && $password == $request->password){
                Cache::put('user', $accessName);
                Cache::put('adm', $isAdm);
                return view('/home');
            }
        }
        $erro = 'erro credenciais';
        return view('/login',['users' => $users])->with('erro','erro credenciais');

    }

    public function register(){
        return view('users.register');
    }

    // public function create(){
    //     return view('users.create');
    // }

    public function storeRegister(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->access_name = $request->access_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status = 1;
        $user->adm = 0;
        $user->save();

        return redirect('/');
    }

    public function create(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->access_name = $request->access_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status = 1;
        $user->adm = 0;
        $user->save();

        return redirect('/users/select');
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->access_name = $request->access_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status = 1;
        $user->adm = $request->adm;
        $user->save();
        return redirect('/users/select');
    }

    public function delete(Request $request){
        $user = User::where('id',$request->id)->delete();
        return redirect('/users/select');
    }
    public function checkAdm(){

    }
}
