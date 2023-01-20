<?php

namespace App\Http\Controllers;

use App\Models\AssignCounselor;
use App\Models\Commission;
use App\Models\CommissionSetting;
use App\Models\Department;
use App\Models\DepartmentCommission;
use App\Models\User;
use App\Traits\BillingTrait;
use App\Traits\CoreTrait;
use Session;
use Illuminate\Http\Request;

class SettingsController extends Controller
{    
    use CoreTrait, BillingTrait;
    public $user, $com, $com_set, $depts, $dept_coms;
    public function __construct(User $users, Commission $com, CommissionSetting $com_set, Department $depts, DepartmentCommission $dept_coms)
    {
        
        $this->users = $users;
        $this->com = $com;
        $this->com_set = $com_set;
        $this->depts = $depts;
        $this->dept_coms = $dept_coms;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.settings.index');
    }
    public function commissions(){
        $com_sets = $this->get_com();

        return view('page.settings.commissions', compact('com_sets'));
    }
    public function departments(){
        $depts = $this->depts->get();
        return view('page.settings.departments', compact('depts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $setting = $this->com_set->where('user_id', $request->toArray()['user_id']);
            
            if(empty($setting->get()->toArray())){
                $this->com_set->create($request->except(['_token']));                
                Session::flash('attention', "Commission of ".$request->toArray()['value']." (".$request->toArray()['type'].") has been set successfully");
                return redirect()->route('settings.commissions');
            }
            $setting->update($request->toArray());
            Session::flash('attention', "Commission of ".$request->toArray()['value']." (".$request->toArray()['type'].") has been set successfully");
            return redirect()->route('settings.commissions');

        } catch (\Throwable $th) {
            Session::flash('error_msg', "Oops. Something went wrong when setting commission.");
            return redirect()->back();
        }
    }

    public function storeDept(Request $request){
        try {
            $this->depts->updateOrCreate($request->except(['_token']));  
            Session::flash('attention', $request->toArray()['name']." Department added successfully ");
            return redirect()->route('settings.departments');
        } catch (\Throwable $th) {
            Session::flash('error_msg', "Oops. Something went wrong when adding ". $request->toArray()['name']." department.");
            return redirect()->back();
        }
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

    public function destroyDept($id){
        try {
            $setting = $this->depts->find($id);
            $setting->delete();
            Session::flash('attention', "Department deleted successfully ");
            return redirect()->route('settings.departments');
        } catch (\Throwable $th) {
            Session::flash('error_msg', "Oops. Something went wrong when deleting department.");
            return redirect()->back();
        }
    }
}
