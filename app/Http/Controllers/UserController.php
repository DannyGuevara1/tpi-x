<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SaleController;

class UserController extends Controller
{
    public function ShowUsers(){
        $users = User::all();
        $respuesta =  json_decode($users, true);

        return response()->json($users);
        /* return view('usuarios')->with('usuarios',$respuesta); */
    }

    public function ShowUser($id){
        $users = User::find($id);
        $respuesta = json_decode($users,true);

        /* return view('usuario')->with('usuario',$respuesta); */
        return response()->json($users);
    }

    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'username' => ['required', Rule::unique('users', 'username')],
            'country' => 'required',
            'image_profile' => 'required',
            'address' => 'required',
            'shipping_address' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required',
        ]);

        if($request->hasFile('image_profile'))
        {
            $formImg = $request->file('image_profile')->store('img_profile', 'public');
        }else{
            $formImg = '/img_profile/default.jpg';
        }

        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'username' => $request->username,
            'country' => $request->country,
            'image_profile' => $formImg,
            'rol' => 'user',
            'address' => $request->address,
            'shipping_address' => $request->shipping_address,
            'description' => $request->description,
            'discount' => 15,
            'gender' => $request->gender,
            'referral_link' => Str::random(5),
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        /* auth()->login($user); */
        return redirect()->route("adminUsers")->withErrors([
            'Message' => 'Usuario Creado Exitosamente!!'
        ])->withInput();
    }

    public function registration(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'username' => ['required', Rule::unique('users', 'username')],
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required',
        ]);
        //SI EL INPUT DE REFERRAL LINK TIENE UN VALOR ENTRA AL IF
        if($request->code){
            //BUSCAMOS EL USUARIO POR EL REFEREAL LINK
            $userEmail = User::where('referral_link', $request->code);
            if($userEmail){
                //SI EL USUARIO TIENE VALORES ES DECIR NO ES UNA RESPUESTA VACIA PROSEGUIMOS
                $userEmail->increment('money_reffer', 2.00);
            }
        }

        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'username' => $request->username,
            'country' => 'undefined',
            'image_profile' => '/img_profile/default.jpg',
            'rol' => 'user',
            'address' => 'undefined',
            'shipping_address' => 'undefined',
            'description' => 'undefined',
            'discount' => 15,
            'money_reffer' => 0,
            'gender' => $request->gender,
            'referral_link' => Str::random(5),
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        auth()->login($user);
        return redirect()->route("index")->withErrors([
            'Message' => 'Registrado Exitosamente!!'
        ])->withInput();
    }

    public function edit(User $id)
    {
        return view('users.profiles')->with('user', $id);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        User::where('id',$id)
             ->update([
                'name' => $request->name ? $request->name:$user->name,
                'age' => $request->age ? $request->age:$user->age,
                'username' => $request->username ? $request->username:$user->username,
                'country' => $request->country ? $request->country:$user->country,
                'address' => $request->address ? $request->address:$user->address,
                'shipping_address' => $request->shipping_address ? $request->shipping_address:$user->shipping_address,
                'description' => $request->description ? $request->description:$user->description,
                'password' => $request->password ? $request->password:$user->password,
                'discount' => 0.0,
                'gender' => $request->gender ? $request->gender:$user->gender,
                 'rol'=> $request->rol ? $request->rol:$user->rol,
                'email' => $request->email ? $request->email:$user->email,
                'password' => $request->password ? Hash::make($request->password):$user->password,
                'updated_at' => now(),
             ]);

        return back()->withErrors(['success'=> 'Actualizado correctamente']);
    }

    public function actImage(Request $request, $id){
            $request->validate([
                'image_profile' => 'required',
            ]);

            if($request->hasFile('image_profile'))
            {
                $formImg = $request->file('image_profile')->store('img_profile', 'public');
            }else{
                $formImg = 'default.jpg';
            }
            User::where('id',$id)
                 ->update([
                    'image_profile' =>  $formImg,
                    'updated_at' => now(),
                 ]);

            return redirect()->route("profile");

    }

    public static function showSales(){
        $request = SaleController::filterProduct();
        return response()->json($request);
    }
    public static function showSalesBuy(){
        $requestBuy = SaleController::filterProductBuy();
        return response()->json($requestBuy);
    }

    public function Login(){
        return view('users.loginUser');
    }

    public function validarSesion(){
        if(auth()->attempt(request(['email','password'])) == false)
        {
            return back()->withErrors([
                'Invalid_Credentials' => 'El Email o Contraseña Es Incorrecto.'
                ])->withInput();
        }else
        {
/*             session(['id' => $user->id]);
            session(['name' => $user->name]);
            session(['age' => $user->age]);
            session(['username' => $user->username]);
            session(['email' => $user->email]);
            session(['country' => $user->country]);
            session(['address' => $user->address]);
            session(['shipping_address' => $user->shipping_address]);
            session(['gender' => $user->gender]);
            session(['rol' => $user->rol]);
            session(['image_profile' => $user->image_profile]);
*/
            return redirect()->route('index')->withErrors([
                'Message' => 'Bienvenido!!!'
            ])->withInput();
        }

    }

    public function Logout(Request $request){
        Auth::Logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return  redirect()->route('index')->withErrors([
            'Message' => 'Hasta Luego!!!'
        ])->withInput();
    }

    public function destroy(Request $request, $id)
    {
//        $token = $request->session()->token();
//        $token = csrf_token();
        $user = User::find($id);
        $user->delete();

    }
}
