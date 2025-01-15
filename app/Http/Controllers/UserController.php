<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
/**
* Write code on Method
*
* @return response()
*/
public function dashboard(Request $request)
{
return view('dashboard');
}
/**
* Write code on Method
*
* @return response()
*/
public function users(Request $request)
{
$users = User::get();
return view('users', compact('users'));
}
}
