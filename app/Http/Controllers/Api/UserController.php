<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Batch;
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
        return UserForm::with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get();
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
                return $query->where('id', $id)->first()?->users()->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get() ?? array();
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
                return $query->where('id', $id)->first()?->users()->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get()
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
                return $query->where('id', $id)->first()?->users()->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get()
                    ?? array();
            }, function ($query) {
                return $query->get();
            });

        return response()->json($batch);
    }
}
