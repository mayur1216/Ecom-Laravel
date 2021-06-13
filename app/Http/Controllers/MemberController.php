<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function show(){

        $data =  Member::all();
        return view('list',['members'=>$data]);
    }

    public function addData(Request $req){

        $member = new Member;
        $member->name = $req->name;
        $member->email = $req->email;
        $member->address = $req->address;
        $member->save();
        return redirect('add');
    
    }

    public function delete($id){

        $data = Member::find($id);
        $data->delete();
        return redirect('list');

    }

  public function showData($id){

       $data =  Member::find($id);
       return view('edit',['data'=>$data]);

  }

  public function update(Request $req){

    $data = Member::find($req->id);
    $data->name = $req->name;
    $data->email = $req->email;
    $data->address = $req->address;
    $data->save();
    return redirect('list');
  }

}
