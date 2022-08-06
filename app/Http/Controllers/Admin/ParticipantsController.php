<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\ParticipantAnswer;
use DB;
use Session;
use Yajra\Datatables\Datatables;

class ParticipantsController extends Controller
{
    private $title = 'Participants';

    public function index(Request $req)
    {
    	if($req->ajax()){
    		$datas = Participant::orderBy('id', 'DESC');

            $datatables = Datatables::of($datas)
            	->editColumn('gender', function($datas){
            		if($datas->gender == 'M'){
            			return 'Laki-laki';
            		}else{
            			return 'Perempuan';
            		}
            	})
                ->addColumn('action', function($datas){
                	$view = '<a href="'.url('admin/participants/view/'.$datas->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</a>';
                    $delete = '<a href="'.url('admin/participants/delete/'.$datas->id).'" class="btn btn-danger btn-delete-on-table btn-sm"><i class="fa fa-times"></i> Hapus</a>';

                    return $view . '&nbsp;' . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);

            return $datatables;
    	}

    	$title = $this->title;
    	$subtitle = 'List ' . $this->title;

    	return view('admin.participants.index', compact('title', 'subtitle'));
    }

    public function view($id)
    {
        $data = Participant::where('id', $id)
            ->first();

        $answerData = ParticipantAnswer::select('questions.question', 'question_answers.answer')
            ->join('questions', 'questions.id', '=', 'participant_answers.question_id')
            ->join('question_answers', 'question_answers.id', '=', 'participant_answers.answer_id')
            ->where('participant_id', $id)
            ->orderBy('questions.seq', 'ASC')
            ->get();


        $title = $this->title;
        $subtitle = 'View ' . $this->title;

        return view('admin.participants.view', compact('title', 'subtitle', 'data', 'answerData'));
    }

    public function delete($id)
    {
        $participant = Participant::where('id', $id)->delete();
        $participantAnswers = ParticipantAnswer::where('participant_id', $id)->delete();

        if($participant && $participantAnswers){
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
