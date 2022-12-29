<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeclineReason;
use App\Models\LawyerCalendar;
use App\Models\Statement;
use App\Models\StatementDeclineByLawyer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiEndpoints extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('login', '=', $credentials['login'])->first();
            $token = $user->createToken($credentials['login']);
            return ['token' => $token->plainTextToken];
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json('logout successful', 201);
    }

    public function lawyer_index(Request $request): \Illuminate\Http\JsonResponse
    {
        $user_id = $request->user()->id;
        $statements = Statement::where('acceptDecline', 1)
            ->where('lawyer_id', $user_id)->get();

        $data = [];
        foreach ($statements as $row) {
            $data[] = [
                'id' => $row->id,
                'number' => "#".$row->id,
                'datetime' => $row->getDate(),
                //'region' => $row->getAuthorRegionCode->title['ru'],
                'author' => $row->getAuthor->name,
                'status_id' => $row->status,
                'status' => $row->getStatusText()
            ];
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function calendar()
    {
        $statements = Statement::where('lawyer_id', auth()->user()->id)->get();
        $data = [];
        foreach ($statements as $row) {
            $data[] = [
                'id' => $row->id,
                'forma_zayav' => $row->getStatementForm->getTitle(),
                'vid_zayav' => $row->getStatementView->getTitle(),
                'number' => "Заявление №".$row->id,
                'fio' => $row->fio,
                'article' => $this->collectArticles($row->getCodesList()),
                'sex' => $row->getGender(),
                'birthday' => $row->birthday,
                'citizenship' => $row->getCitizenship->getTitle(),
                'status' => $this->checkForSS($row->social_status_id, $row),
                'document' => $row->document,
                'address_reg' => $row->register_address,
                'address_fact' => $row->fact_address,
                'statement_place' => $row->register_place,
                'PIN' => $row->inn,
                'phone' => $row->phone,
                'arrested_time' => $row->fact_time_arrest,
                'applicant_is' => $row->getApplicantIs->getTitle(),
                'applicant_status' => $row->getApplicantStatusList(),
                'zaderjanie' => $row->getPeriodDay(),
                'identity_card' => $row->getIdentityCard(),
                'author' => $row->getAuthor->name,
                'statement_status' => $row->getStatusText(),
                'date' =>  $row->created_at->toDateTimeString(),
                'datetime' => $row->getDate(),
                'day' => $row->getDate()
            ];
        }
        return response()->json([
            'data' => [
                'type' => 'statements items',
                'message' => 'Success',
//                'statements' => $statements->groupBy('day')
                'statements' => $data
            ]
        ]);
    }

    public function statement_by_id($id)
    {
        $statement = Statement::where('lawyer_id', auth()->user()->id)->where('id', intval($id))->first();
        $data = [
            'id' => $statement->id,
            'forma_zayav' => $statement->getStatementForm->getTitle(),
            'vid_zayav' => $statement->getStatementView->getTitle(),
            'number' => "Заявление №".$statement->id,
            'fio' => $statement->fio,
            'article' => $this->collectArticles($statement->getCodesList()),
            'sex' => $statement->getGender(),
            'birthday' => $statement->birthday,
            'citizenship' => $statement->getCitizenship->getTitle(),
            'status' => $this->checkForSS($statement->social_status_id, $statement),
            'document' => $statement->document,
            'address_reg' => $statement->register_address,
            'address_fact' => $statement->fact_address,
            'statement_place' => $statement->register_place,
            'PIN' => $statement->inn,
            'phone' => $statement->phone,
            'arrested_time' => $statement->fact_time_arrest,
            'applicant_is' => $statement->getApplicantIs->getTitle(),
            'applicant_status' => $statement->getApplicantStatusList(),
            'zaderjanie' => $statement->getPeriodDay(),
            'identity_card' => $statement->getIdentityCard(),
            'author' => $statement->getAuthor->name,
            'statement_status' => $statement->getStatusText(),
            'statement_status_id' => $statement->status,
            'date' =>  $statement->created_at->toDateTimeString(),
            'datetime' => $statement->getDate(),
            'day' => $statement->getDate()
        ];
        return response()->json([
            'data' => [
                'type' => 'statements items',
                'message' => 'Success',
                'statement' => $data
            ]
        ]);
    }

    public function lawyers_schedule(Request $request)
    {
        $user_id = $request->user()->id;
        $rows = LawyerCalendar::where('lawyer_id', '=', $user_id)->get();
        $lawyers = [];
        foreach ($rows as $row) {
            $lawyers[] = [
                'id' => $row->id,
                'title' => $row->getLawyer->name,
                'description' => $row->getMain(),
                'work_or_spec' => (!empty($row->getWork())) ? $row->getWork() : $row->getSpec(),
                'start' => $row->dateEvent,
            ];
        }
        return response()->json($lawyers);
    }

    public function updateFcmToken(Request $request)
    {
        $user = $request->user();
        $current_token = $user->getFCMToken();
        $new_token = $request->fcm_user_token;

        if ($current_token != $new_token) {
            $user->fcm_token = $new_token;
            $user->save();
            return response()->json('Success');
        }
        return response()->json('Not changed', 304);
    }

    // Регистрация или Отклонение заявления
    public function acceptOrDecline(Request $request){
        $acceptOrDecline = strval($request->accept);
        $decline_reason = strval($request->reason);
        $statement_id = intval($request->record_id);
        $statement = Statement::findOrfail($statement_id);
        if ($acceptOrDecline == 'accept') {
            $statement->status = 3;
            $statement->save();
            return response()->json([
                'status' => 'accept'
            ]);
        } elseif ($acceptOrDecline == 'decline' && !empty($decline_reason)) {
            $statement->status = 4;
            $user_id = $request->user()->id;
            StatementDeclineByLawyer::create([
                'statement_id' => $statement->id,
                'decline_desc' => $decline_reason,
                'lawyer_id' => $user_id,
            ]);
            $statement->save();
            return response('Success', 200);
        }else{
            return response('Error', 400);
        }
    }

    // Checking for nul of Social Status
    public function checkForSS($social_status, $row) {
        if ($social_status !== null) {
            return $row->getSocialStatus->getTitleRu();
        }
        return "Не определен";
    }

    // Make text from array of articles
    public function collectArticles($articles) {
        $article_text = "";
        if ($articles) {
            foreach ($articles as $article)
            {
                $article_text = $article_text . $article['text'] . ";";
            }
        }
        return $article_text;
    }

    // Decline Reasons list
    public function decline_reasons()
    {
        $reasons = DeclineReason::all();
        return response()->json([
            'data' => [
                'type' => 'Reason items',
                'message' => 'Success',
                'reasons' => $reasons
            ]
        ]);
    }

}
