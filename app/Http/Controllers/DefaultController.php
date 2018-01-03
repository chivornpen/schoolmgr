<?php

namespace App\Http\Controllers;

use App\Position;
use App\Role;
use App\User;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class DefaultController extends Controller
{
    
    public function index(){

        $role = Role::all();
        if(!count($role)){

            $Role = new Role();
            $Role->name = "administrator";
            $Role->description="Administrator";
            $Role->user_id=1;
            $Role->save();

            $Role = new Role();
            $Role->name = "user";
            $Role->description="Users";
            $Role->user_id=1;
            $Role->save();

            $Role = new Role();
            $Role->name = "guest";
            $Role->description="Guest";
            $Role->user_id=1;
            $Role->save();
        }
        $module = Module::all();
        if(!count($module)){
           $module = new Module();
           $module->name         =  "Administrator";
           $module->nav          =   "admin.nav.administrator";
           $module->user_id      =   1;
           $module->active       =  1;
           $module->save();

        }
        $position = Position::all();
        if(!count($position)){
           $pos = new Position();
           $pos->name = "Administrator";
           $pos->description="Administrator";
           $pos->user_id=1;
           $pos->save();
           $pos->modules()->attach($module);
        }

        $user = User::all();
        if(!count($user)){
           $users = new User();
           $users->active       =  1;
           $users->role_id      =   1;
           $users->position_id  =   1;
           $users->name         =   "SuperUser";
           $users->username     =  "SuperUser";
           $users->email        =  "superuser@gmail.com";
           $users->password     =  bcrypt('camsofts');
           $users->photo        =  "default_user.png";
           $users->save();
           $users = new User();
           $users->active       =  1;
           $users->role_id      =   1;
           $users->position_id  =   1;
           $users->name         =   "Administrator";
           $users->username     =  "Administrator";
           $users->email        =  "Admin@gmail.com";
           $users->password     =  bcrypt('admin');
           $users->photo        =  "default_user.png";
           $users->save();
           

        }
        
        if(Auth::check()) {
            
            return view('admin.dashboard');
        }
         
        return view('welcome');
    }

    public function AdminPanel(){
       
        return view(' admin.dashboard');
    }
    
}
