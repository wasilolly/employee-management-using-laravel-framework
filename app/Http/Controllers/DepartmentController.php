<?php

namespace App\Http\Controllers;

use App\Department;
use App\Role;
use Illuminate\Http\Request;
use Session;

class DepartmentController extends Controller
{
   
	public function __construct()
    {
        $this->middleware('admin');
    }

   /**
     * Display all departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.departments.index',['departments'=>Department::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
			'name' =>'required|max:50'	
		]);
		
		Department::create([
		    'name' => $request->name,
			'slug' => str_slug($request->name)
		]);
		
		Session::flash('success', 'department created');
		return redirect()->route('departments.index');
						
		
    }

    /**
     * Display a department.
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    { 
		return view('admin.departments.show', ['department'=> Department::where('slug',$slug)->first()]);
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
		return view('admin.departments.edit',['department' => Department::find($id)]);
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
		$this->validate($request,[
			'name' =>'required|max:50'	
		]);
		
		$department=Department::find($id);
		$department->name = $request->name;
		$department->slug = str_slug($request->name);
		$department->save();
		
		Session::flash('success', 'department updated');
		return redirect()->route('departments.index');
						
    }

    /**
     * Remove a department including all roles attached from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=Department::find($id);
		
		foreach($department->roles as $role){
			$role->delete();			
		}
		
		$department->delete();
		
		Session::flash('success', 'department deleted');
		return redirect()->route('departments.index');
						
    }
}
