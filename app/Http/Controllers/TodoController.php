<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Http\Resources\getAlltodosResource;
use App\Http\Resources\getOnetodosResource;

class TodoController extends Controller
{
    function __construct(
      Todo  $Model
    )
    {
        $this->model=$Model;
    }

    public function Index()
    {  return response()->json($this->model::all() );
       return getAlltodosResource::collection( $this->model::all() );
    }

    public function Show( $id)
    { return response()->json($this->model::where('id',$id)->get());
        return getOnetodosResource::collection( $this->model::where('id',$id)::orderBy('id','DESC')->get() );
    }

    public function Store(postRequest $data)
    {
        $this->model->create($data->validated());
        return ['msg'=>'created successfully!!'];
    }

    public function Destroy($id)
    {  $findData=$this->model::find($id);
        if($findData == null || '')return ['msg'=>'data not found!!'];
        $findData->delete();
         return ['msg'=>'deleted successfully'];
    }

    public function Patch($id,Request $data)
    {//return 'hai';
        $findData=$this->model::find($id);
        if($findData == null || '')return ['msg'=>'data not found!!'];
        // if(gettype($findData) !==  'integer' or 'double')return ['msg'=>'id must be int!!'];
        $filter=$data->all();
        //return dd($filter);
        $this->model::find($id)->update($filter);
        return ['msg'=>'updated successfully!'];
    }
} //end of class
