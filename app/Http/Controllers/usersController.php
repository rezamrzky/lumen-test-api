<?php

namespace app\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class usersController extends Controller {

   public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }

    //memanggil semua data pada table users
    public function index(){

        $users = users::all();

        return response() -> json($users);

    }

    //membuat data users baru
    public function create(Request $request)
     {
        $users = new users;

       $users->firstName= $request->firstName;
       $users->lastName= $request->lastName;
       $users->gender= $request->gender;
       $users->status= $request->status;
       $users->email= $request->email;
       $users->city= $request->city;
       $users->address= $request->address;
       $users->phone= $request->phone;
       
       $users->save();

       return response()->json($users);
     }

     //menampilkan data users dengan id tertentu
     public function show($id)
     {
        $users = users::find($id);

        return response()->json($users);
     }

     //melakukan update data users pada id tertentu
     public function update(Request $request, $id)
     { 
        $users= users::find($id);

        $users->firstName= $request->input('firstName');
        $users->lastName= $request->input('lastName');
        $users->gender= $request->input('gender');
        $users->status= $request->input('status');
        $users->email= $request->input('email');
        $users->city= $request->input('city');
        $users->address= $request->input('address');

        $users->save();
        return response()->json($users);
     }

     //menghapus data users pada id tertentu
     public function destroy($id)
     {
        $users = users::find($id);
        $users->delete();

         return response()->json('product removed successfully');
     }

     //menampilkan data user berdasarkan per halaman
     public function paging(Request $requestJson){

         $request = $this->request->all();

         $users = users::select($request['select'])
         ->whereNotIn($request['conditions'][2]['data'][0], $request['conditions'][2]['data'][1])
         ->orderBy($request['order'][1]['field'], $request['order'][1]['order'])
         ->paginate($request['limit']);

         $result = array(
            "limit"=>$request['limit'], 
            "total_row"=>$users->perPage(),
            "total_data"=>$users->total(), 
            "total_page"=>$users->lastPage(),
            "current_page"=>$users->currentPage(),
            "data"=>$users->items()
         );

         $resultJson = json_encode($result, JSON_PRETTY_PRINT);

         return response($resultJson);

     }



 }


