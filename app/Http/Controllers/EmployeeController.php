<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\Department;
use App\User;
use Session;
use PDF;

use App\Notifications\NewUserPasswordNotification;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;



class EmployeeController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

	/**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employees.index', ['employees'=>Employee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		$roles=Role::all();
		if($roles->count()==0){
			Session::flash('info', 'you must have at least 1 department/role created before attempting to create an employee');
			return redirect()->route('roles.create');
		}
        return view('admin.employees.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     * Automatically creates a new employee->user account
     * @param  StoreEmployee  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {      
		
	    $employee = Employee::create([
			'fname' => $request->fname,
			'lname' => $request->lname,
			'birth_date' => $request->birth_date,
			'hired_date' => $request->hired_date,
			'street' => $request->street,
			'town' => $request->town,
			'city' => $request->city,
			'country' => $request->country,
			'phone' => $request->phone,
			'gender' => $request->gender,
			'role_id' => $request->role_id,	
			'email' => $request->email
		]);
		
		$otp = str_random(10);
		$user= new User;
		$user->email = $employee->email;
		$user->password=bcrypt($otp);
		$user->employee_id = $employee->id;
		$user->save();
		
		
		$user->notify(new NewUserPasswordNotification($user));
		Session::flash('success', 'New User created');
		return redirect()->route('employees.index');
	}
    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function show($id)
    {
        return view('admin.employees.show',['employee'=>Employee::find($id)]);
    }
	
	public function downloadPDF($id){
		$pdf = PDF::loadview('admin.employees.show',['employee'=>Employee::find($id)]);
		return $pdf->download('employee.pdf');
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.employees.edit', ['employee'=>Employee::find($id),
											'roles'=>Role::all()]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        $employee=Employee::find($id);
		
		$employee->fname = $request->fname;			
		$employee->lname = $request->lname;
		$employee->birth_date = $request->birth_date;
		$employee->hired_date = $request->hired_date;
		$employee->street = $request->street;
		$employee->town = $request->town;
		$employee->city = $request->city;
		$employee->country = $request->country;
		$employee->phone = $request->phone;
		$employee->gender = $request->gender;
		$employee->role_id = $request->role_id;
		$employee->email = $request->email;		
		$employee->save();
		
		$employee->user->email = $employee->email;	
		$employee->user->save();
		
		Session::flash('sucess','Employee deleted');
		return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::findOrFail($id);
		$employee->user->active = 0;
		
		$employee->delete();
		
		Session::flash('sucess','Employee deleted and user account deactivated');
		return redirect()->route('employees.index');
    }
	
	public function bin(){
		$employees=Employee::onlyTrashed()->get();
		return view('admin.employees.bin')->with('employees', $employees);
	}
	
	public function restore($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		$employee->user->active = 1;
		$employee->restore();
		
		Session::flash('success', 'The employee user account is now active/restored.');
		return redirect()->route('employees.index');
	}
	
	public function kill($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		$employee->user->delete();
		$employee->forceDelete();
		
		Session::flash('success', 'The employee user account has been permanently destroyed.');
		return redirect()->route('employees.index');
	}
	
	
}
