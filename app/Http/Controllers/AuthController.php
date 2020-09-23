<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\TypeUser;
use DB;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        //
        if($request->password){
            $password = Hash::make($request['password']);
        }else{
            $documento = $request->documento;
            $password = Hash::make(substr($documento, -4));
        }

        $usuario = new User();
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->documento = $request->documento;
        $usuario->email = $request->email;
        $usuario->estado = $request->estado;
        $usuario->password = $password; 
        $usuario->save();

        $id_usuario = $usuario->id;

        $type_user = new TypeUser();
        $type_user->id_user = $id_usuario;
        $type_user->id_rol = '4';
        $type_user->save();

        return response()->json(['response'=>'Usuario creado correctamente.']);

    }



    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string',
            'password'    => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Sus datos de acceso son incorrectos'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();


        $estado = Auth::user()->estado;

         $user = DB::table('users as u')
        ->join('type_user as t','t.id_user','=','u.id')
        ->where('u.id','=',Auth::user()->id)
        ->select('*')->get();

        $id_rol = $user[0]->id_rol;
        $id_user = $user[0]->id_user;

        

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'estado' => $estado,
            'apellidos'=> Auth::user()->apellidos,
            'documento'=> Auth::user()->documento,
            'email' => Auth::user()->email,
            'id'=>Auth::user()->id,
            'id_rol'=> $id_rol,
            'id_user'=> $id_user,
            'nombres' => Auth::user()->nombres,
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        $id_user = Auth::user()->id;
        $user = DB::table('users as u')
        ->join('type_user as t','t.id_user','=','u.id')
        ->where('u.id','=',$id_user)
        ->select('*')->get();


        return response()->json($user);
    }
}


