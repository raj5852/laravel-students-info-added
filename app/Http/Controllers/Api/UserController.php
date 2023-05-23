<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Designation;
use App\Models\User;
use App\Models\UserForm;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $search = request('search');

        $data  =   UserForm::scopeSearch();

        return response()->json($data);
    }

    function division()
    {
        $id = request('id');

        $divisions = Division::query()
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id)->first()?->districts ?? array();
            }, function ($query) {
                return $query->get();
            });
        return response()->json($divisions);
    }

    function district()
    {
        $id = request('id');
        $district = District::query()
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id)->first()?->upazilas ?? array();
            }, function ($query) {
                return $query->get();
            });

        return response()->json($district);
    }
    function upazila()
    {
        $id = request('id');

        $upzila = Upazila::query()
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id)->first()?->users()->where('status', 'active')->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get() ?? array();
            }, function ($query) {
                return $query->get();
            });
        return response()->json($upzila);
    }



    function districtToInfo()
    {
        $id = request('id');

        $district = District::query()

            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id)->first()?->users()->where('status', 'active')->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get()
                    ?? array();
            }, function ($query) {
                return $query->get();
            });

        return response()->json($district);
    }

    function batches()
    {
        $id = request('id');

        $batch = Batch::query()
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id)->first()?->users()->where('status', 'active')->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get()
                    ?? array();
            }, function ($query) {
                return $query->get();
            });

        return response()->json($batch);
    }
    function designation()
    {
        $id = request('id');

        $deg = Designation::all();
        if ($id) {
            $data = Designation::find($id);
            if ($data) {
                $users = $data->users()->where('status', 'active')->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name', 'designationdata:id,name'])->get();

                return response()->json($users);
            }
        }
        return response()->json($deg);
    }

    function directorate($data){
        $userform  = UserForm::where('status','active')->where('last_name_of_regi',$data)->with(['divisiondata:id,name','districtdata:id,name','upaziladata:id,name','batchdata:id,name','designationdata:id,name'])->get();
        return response()->json($userform);
    }

    function registration($data){
        $userform  = UserForm::where('status','active')->where('last_name_of_attach',$data)->with(['divisiondata:id,name','districtdata:id,name','upaziladata:id,name','batchdata:id,name','designationdata:id,name'])->get();
        return response()->json($userform);
    }

    function customApi($id = null){

        $datas = [
            1=>'IGR',
            2=>'AIGR',
            3=>'DIGR',
            4=>'IRO',
            5=>'District Registrar',
            6=>'Sub Registrar',
            7=>'Office stuff',
        ];
        $response =  collect($datas);

        if($id){
            $value = $response->get($id);

            $userform  = UserForm::where('status','active')->where('last_name_of_regi',$value)->with(['divisiondata:id,name','districtdata:id,name','upaziladata:id,name','batchdata:id,name','designationdata:id,name'])->get();
            return response()->json($userform);
        }else{
          return response()->json($response->all());
        }
    }

    function AttachToRegistration($id = null){
        $datas = [
            1=>'District Registrar',
            2=>'Sub Registrar'
        ];
        $response =  collect($datas);

        if($id){
            $value = $response->get($id);

            $userform  = UserForm::where('status','active')->where('last_name_of_attach',$value)->with(['divisiondata:id,name','districtdata:id,name','upaziladata:id,name','batchdata:id,name','designationdata:id,name'])->get();
            return response()->json($userform);
        }else{
          return response()->json($response->all());
        }
    }

}
