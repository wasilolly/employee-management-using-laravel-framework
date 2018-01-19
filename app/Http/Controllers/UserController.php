<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index()
    {
        return view('admin.users.index', ['users'=>User::all() ]);
    }

    public function activate($id)
    {
        $user=User::find($id);
		$user->active=1;
		
		$user->save();
		
		Session::flash('success', 'User activated');
		return redirect()->back();
    }
	public function deactivate($id)
    {
        $user=User::find($id);
		$user->active=0;
		
		$user->save();
		
		Session::flash('success', 'User deactivated');
		return redirect()->back();
    }
	public function admin($id){
		$user = User::find($id);
		$user->admin = 1;
		
		$user->save();
		
		Session::flash('success', 'Admin priviledge granted');
		return redirect()->back();
	}
	
	public function notAdmin($id){
		$user = User::find($id);
		$user->admin = 0;
		
		$user->save();
		
		Session::flash('success', 'User admin Permissions revoked');
		return redirect()->back();
	}
}
