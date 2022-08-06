<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Participant;
use App\Models\ParticipantAnswer;
use DB;
use Session;

class IndexController extends Controller
{
    public function index()
    {
    	$questions = Question::orderBy('seq', 'ASC')
    		->get();

    	foreach($questions as $key => $val){
    		$answers[$key] = QuestionAnswer::where('question_id', $val->id)->orderBy('id', 'ASC')->get();
    	}

	return view('index', compact('questions', 'answers'));
    }

    public function store(Request $req)
    {
    	$input = $req->all();

    	$data['name'] = $input['name'];
    	$data['gender'] = $input['gender'];
    	$data['email'] = $input['email'];
    	$data['phone_number'] = $input['phone_number'];
    	$data['date_of_birth'] = $input['date_of_birth'];
    	$data['address'] = $input['address'];

    	$participant = Participant::create($data);

        $codeArr = [];
    	foreach($input['participant_answers'] as $key => $val){
    		$dataAnswer['participant_id'] = $participant->id;
    		$dataAnswer['question_id'] = $val['question_id'];

            $answerId = explode('/', $val['answer_id']);
    		$dataAnswer['answer_id'] = $answerId[0];
            $dataAnswer['code'] = $answerId[1];

            array_push($codeArr, $answerId[1]);

    		$participantAnswer = ParticipantAnswer::create($dataAnswer);
    	}

        if(empty(array_diff($codeArr, ['G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7']))){
            $result = 'X1';
        }else if(empty(array_diff($codeArr, ['G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G07']))){
            $result = 'X2';
        }else if(empty(array_diff($codeArr, ['G1', 'G2', 'G3', 'G4', 'G05', 'G06', 'G07']))){
            $result = 'X2';
        }else{
            $result = 'X3';
        }

        Participant::where('id', $participant->id)->update(['result' => $result]);

    	return redirect('thank-you')->with('status', $result);
    }
}