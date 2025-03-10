<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Avis;
use Brian2694\Toastr\Facades\Toastr;

class AvisController extends Controller
{
    /** add avis page */
    public function avisAdd()
    {
        return view('avis.add-avis');
    }

    /** avis list */
    public function avisList()
    {
        $listAvis = DB::table('users')
            ->join('avis','avis.avis_id','users.user_id')
            ->select('users.user_id','users.name','users.avatar','avis.id','avis.gender','avis.mobile','avis.address')
            ->get();
        return view('avis.list-avis',compact('listAvis'));
    }

    /** avis Grid */
    public function avisGrid()
    {
        $avisGrid = avis::all();
        return view('avis.avis-grid',compact('avisGrid'));
    }

    /** save record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'full_name'       => 'required|string',
            'gender'          => 'required|string',
            'date_of_birth'   => 'required|string',
            'mobile'          => 'required|string',
            'joining_date'    => 'required|string',
            'qualification'   => 'required|string',
            'experience'      => 'required|string',
            'username'        => 'required|string',
            'email'           => 'required|string',
            'password'        => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'address'         => 'required|string',
            'city'            => 'required|string',
            'state'           => 'required|string',
            'zip_code'        => 'required|string',
            'country'         => 'required|string',
        ]);

        try {
        
            $dt        = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
            
                 
            User::create([
                'name'      => $request->full_name,
                'email'     => $request->email,
                'join_date' => $todayDate,
                'role_name' => 'avis',
                'password'  => Hash::make($request->password),
            ]);
            $user_id = DB::table('users')->select('user_id')->orderBy('id','DESC')->first();
            
            $saveRecord = new avis;
            $saveRecord->avis_id    = $user_id->user_id;
            $saveRecord->full_name     = $request->full_name;
            $saveRecord->gender        = $request->gender;
            $saveRecord->date_of_birth = $request->date_of_birth;
            $saveRecord->mobile        = $request->mobile;
            $saveRecord->joining_date  = $request->joining_date;
            $saveRecord->qualification = $request->qualification;
            $saveRecord->experience    = $request->experience;
            $saveRecord->username      = $request->username;
            $saveRecord->address       = $request->address;
            $saveRecord->city          = $request->city;
            $saveRecord->state         = $request->state;
            $saveRecord->zip_code      = $request->zip_code;
            $saveRecord->country       = $request->country;
            $saveRecord->save();
   
            Toastr::success('Has been add successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('fail, Add new record  :)','Error');
            return redirect()->back();
        }
    }

    /** edit record */
    public function editRecord($id)
    {
        $avis = avis::where('id',$id)->first();
        return view('avis.edit-avis',compact('avis'));
    }

    /** update record avis */
    public function updateRecordavis(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'full_name'     => $request->full_name,
                'gender'        => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'mobile'        => $request->mobile,
                'joining_date'  => $request->joining_date,
                'qualification' => $request->qualification,
                'experience'    => $request->experience,
                'username'      => $request->username,
                'address'       => $request->address,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip_code'      => $request->zip_code,
                'country'      => $request->country,
            ];
            avis::where('id',$request->id)->update($updateRecord);
            
            Toastr::success('Has been update successfully :)','Success');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update record  :)','Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function avisDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            avis::destroy($request->id);
            DB::commit();
            Toastr::success('Deleted record successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Deleted record fail :)','Error');
            return redirect()->back();
        }
    }
}
