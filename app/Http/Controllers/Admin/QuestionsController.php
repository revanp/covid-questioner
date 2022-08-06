<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionAnswer;
use DB;
use Session;
use Yajra\Datatables\Datatables;

class QuestionsController extends Controller
{
    private $title = 'Questions';

    public function index(Request $req)
    {
    	if($req->ajax()){
    		$datas = Question::orderBy('id', 'DESC');

            $datatables = Datatables::of($datas)
                ->addColumn('action', function($datas){
                	$view = '<a href="'.url('admin/questions/view/'.$datas->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</a>';
                    $edit = '<a href="'.url('admin/questions/edit/'.$datas->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $delete = '<a href="'.url('admin/questions/delete/'.$datas->id).'" class="btn btn-danger btn-delete-on-table btn-sm"><i class="fa fa-times"></i> Hapus</a>';

                    return $view . '&nbsp;' . $edit . '&nbsp;' . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);

            return $datatables;
    	}

    	$title = $this->title;
    	$subtitle = 'List ' . $this->title;

    	return view('admin.questions.index', compact('title', 'subtitle'));
    }

    public function view($id)
    {
    	$data = Question::where('id', $id)->first();
    	$answerData = QuestionAnswer::where('question_id', $id)->get();

    	$title = $this->title;
    	$subtitle = 'View ' . $this->title;

    	return view('admin.questions.view', compact('title', 'subtitle', 'data', 'answerData'));
    }

    public function create()
    {
    	$title = $this->title;
    	$subtitle = 'Add ' . $this->title;

    	return view('admin.questions.create', compact('title', 'subtitle'));
    }

    public function store(Request $req)
    {
        $input = $req->all();

        $data['question'] = $input['question'];
        $data['seq'] 	  = $input['seq'];

    	$question = Question::create($data);

        foreach($input['answer'] as $key => $val){
        	if(!empty($val)){
        		$dataAnswer['question_id'] = $question->id;
        		$dataAnswer['answer'] = $val;
                $dataAnswer['code'] = $input['code'][$key];

        		$questionAnswer = QuestionAnswer::create($dataAnswer);
        	}
        }

    	if($question){
    		Session::flash('message', $this->title . ' berhasil di entry');
			Session::flash('alert-class', 'alert-success');

			return redirect('admin/questions');
    	}else{
    		Session::flash('message', $this->title . ' gagal di entry');
			Session::flash('alert-class', 'alert-danger');
    	}
    }

    public function edit($id)
    {
    	$data = Question::where('id', $id)->first();
    	$answerData = QuestionAnswer::where('question_id', $id)->get();

    	$title = $this->title;
    	$subtitle = 'Edit ' . $this->title;

    	return view('admin.questions.edit', compact('title', 'subtitle', 'data', 'answerData'));
    }

    public function update($id, Request $req)
    {
        $input = $req->all();

        $data['question'] = $input['question'];
        $data['seq']      = $input['seq'];

    	$question = Question::where('id', $id)->update($data);

    	QuestionAnswer::where('question_id', $id)->delete();

        foreach($input['answer'] as $key => $val){
            if(!empty($val)){
                $dataAnswer['question_id'] = $id;
                $dataAnswer['answer'] = $val;
                $dataAnswer['code'] = $input['code'][$key];

                $questionAnswer = QuestionAnswer::create($dataAnswer);
            }
        }

    	if($question){
    		Session::flash('message', $this->title . ' berhasil di update');
			Session::flash('alert-class', 'alert-success');

			return redirect('admin/questions');
    	}else{
    		Session::flash('message', $this->title . ' gagal di update');
			Session::flash('alert-class', 'alert-danger');
    	}
    }

    public function delete($id)
    {
        $question = Question::where('id', $id)->delete();
        $questionAnswer = QuestionAnswer::where('question_id', $id)->delete();

        if($question && $questionAnswer){
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
