<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
	private $title = 'Users';

    public function index(Request $req)
    {
    	if($req->ajax()){
    		$datas = User::orderBy('id', 'DESC');

            $datatables = Datatables::of($datas)
                ->addColumn('action', function($datas){
                    $edit = '<a href="'.url('admin/users/edit/'.$datas->id).'" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>';
                    $delete = '<a href="'.url('admin/users/delete/'.$datas->id).'" class="btn btn-danger btn-delete-on-table"><i class="fa fa-times"></i> Hapus</a>';

                    return $edit . '&nbsp;' . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);

            return $datatables;
    	}

    	$title = $this->title;
    	$subtitle = 'List ' . $this->title;

    	return view('admin.users.index', compact('title', 'subtitle'));
    }

    public function create()
    {
    	$title = $this->title;
    	$subtitle = 'Add ' . $this->title;

    	return view('admin.users.create', compact('title', 'subtitle'));
    }

    public function store(Request $req)
    {
        $data['name']     = $req->name;
        $data['username'] = $req->username;
        $data['password'] = bcrypt($req->password);
        $data['email']    = $req->email;

    	$user = User::create($data);

    	if($user){
    		Session::flash('message', $this->title . ' berhasil di entry');
			Session::flash('alert-class', 'alert-success');

			return redirect('admin/users');
    	}else{
    		Session::flash('message', $this->title . ' gagal di entry');
			Session::flash('alert-class', 'alert-danger');
    	}
    }

    public function edit($id)
    {
        $title = $this->title;
        $subtitle = 'Edit ' . $this->title;

        $data = User::findOrFail($id);

        return view('admin.users.edit', compact('title', 'subtitle', 'data'));
    }

    public function update($id, Request $req)
    {
        $data['name']     = $req->name;
        $data['username'] = $req->username;
        $data['email']    = $req->email;

        if(!empty($req->password)){
            $data['password'] = bcrypt($req->password);
        }

        $user = User::where('id', $id)->update($data);

        if($user){
            Session::flash('message', $this->title . ' berhasil di update');
            Session::flash('alert-class', 'alert-success');

            return redirect('admin/users');
        }else{
            Session::flash('message', $this->title . ' gagal di update');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->delete();

        if($user){
            return response([
                'level' => 'success',
                'message' => 'Berhasil Menghapus ' . $this->title,
                'text' => 'Success'
            ]);
        }else{
            return response([
                'level' => 'error',
                'message' => 'Gagal Menghapus ' . $this->title,
                'text' => 'Error'
            ]);
        }
    }
}
