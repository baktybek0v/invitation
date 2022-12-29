<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\InviteeQr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;


class EventInviteeQrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Event $event)
    {	
		if ($request->ajax()) {
			$data = $event->inviteesQr()->where('status', 'accept')->get();

			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('full_name', function ($row) {
					return $row->full_name;
				})
				->addColumn('email', function ($row) {
					return $row->email;
				})
				->addColumn('organization', function ($row) {
					return $row->organization;
				})
				->addColumn('job', function ($row) {
					return $row->job;
				})
				->addColumn('action', function ($row) use ($event) {
					$show = '<a href="' . route('bash.events.invitees_qr.show', [$event, $row]) . '" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Просмотреть">
								<span class="svg-icon svg-icon-md">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
											<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
										</g>
									</svg>
								</span>
							</a>';

					return "$show";
				})
				->rawColumns(['action']) // делает строку как html
				->make(true);
		}

        return view('bash.events.invitees_qr.index', compact('event'));
    }

   
	
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, InviteeQr $invitees_qr)
    {
		$invitee = $invitees_qr;
		return view('bash.events.invitees_qr.show', compact('event', 'invitee'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
		Route::dispatchToRoute(Request::create(url()->previous()));
        $previousRoute = Route::currentRouteName();

        if($previousRoute == 'bash.events.invitees_qr.show'){
            return redirect()->route('bash.index');
        }else{
            return response('Success', 200);
        }
    }
	
}
