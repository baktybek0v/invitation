<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Models\Email;
use App\Models\Event;
use App\Models\Invitee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
	public function send(Event $event) {
		try {
			$invitees = $event->invitees->where('sended', false);

			if ($invitees->count() == 0) {
				dd('Все приглашаемые уже получили письмо');
			}
			
			foreach ($invitees as $invitee) {
				Mail::to($invitee->email)->send(new InvitationMail($event, $invitee));
				$invitee->sended = true;
				$invitee->save();
			}

			if ($event->status == 'created')  {
				$event->status = 'sended';
			} else if ($event->status == 'sended')  {
				$event->status = 'resended';
			} else if ($event->status == 'resended') {
				$event->resended_amount = (int) $event->resended_amount + 1;
			}

			$event->save();

		} catch (\Throwable $th) {
			dd('Возникла ошибка при отправке приглашений:', $th);
		}

		return redirect()->route('bash.events.show', $event);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {		
		if ($request->ajax()) {
			$data = Event::get()->sortByDesc('id');

			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('title', function ($row) {
					return $row->getAvialTitle();
				})
				->addColumn('start_date', function ($row) {
					return $row->start_date;
				})
				->addColumn('invitees', function ($row) {
					return $row->invitees->count();
				})
				->addColumn('invitees_qr', function ($row) {
					return $row->inviteesQr->count();
				})
				->addColumn('sended_percentage', function ($row) {
					return $row->getSendedPercentage();
				})
				->addColumn('action', function ($row) {

					$show = '<a href="' . route('bash.events.show', $row->id) . '" class="btn btn-sm btn-default btn-text-dark btn-hover-success btn-icon mr-2" title="Просмотреть">
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

					$edit = '<a href="'.route('bash.events.edit', $row->id).'" class="btn btn-sm btn-default btn-text-dark btn-hover-warning btn-icon mr-2" title="Редактировать">
						<span class="svg-icon svg-icon-md mr-0">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>\
									<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
									<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								</g>
							</svg>
						</span>
					</a>';

					$delete = '<a href="' . route('bash.events.destroy', $row) . '" data-id="' . $row->id . '" class="btn btn-sm btn-default btn-text-dark btn-hover-danger btn-icon btn-to-alert" title="Удалить">
                                            <span class="svg-icon svg-icon-md mr-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>';
					
					return $show . ' ' . $edit . ' ' . $delete;
				})
				->rawColumns(['sended_percentage', 'action']) // делает строку как html
				->make(true);
		}

        return view('bash.events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$event = new Event();
		$emails = Email::all();
		return view('bash.events.create', compact('event', 'emails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	
    public function store(Request $request)
    {	
		$validator = Validator::make($request->all(), [
			'title_en' => 'bail|required_without_all:title_ru,title_ky',
			'title_ru' => 'bail|required_without_all:title_en,title_ky',
			'title_ky' => 'bail|required_without_all:title_en,title_ru',
			'file_invitees' => 'required|mimes:xlsx,xls'
		]);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
        }
	
		$event = Event::create($request->except('file_invitees'));

		// 2. Загрузка файла на сервер
		try {
			$file = $request->file('file_invitees');

			if($file) {
				// 1. Валидация файла
				$errors = $this->fileValidation($event, $file);

				if (count($errors) > 0 ){
					for ($i = 0, $len = count($errors); $i < $len; $i++) {
						$validator->errors()->add(
							$i + 1, $errors[$i]
						 );
					}
					return redirect()->back()->withErrors($validator)->withInput();
				}

				// 1. Сохранение данных из файла
				$this->storeInvitees($event, $file);

				// 2. Загрузка файла на сервер
				$dir  = config('global.event_invitees_directory');
				$filePath = UploadController::uploadFile($dir, $file);

				// 3. Сохранение пути файла
				$event->file_invitees = $filePath;

				// 5. Генерация QR ссылок
				$event->qr_en = $request->getHttpHost() . "/en/invitation/qr/" . $event->id;
				$event->qr_ru = $request->getHttpHost() . "/ru/invitation/qr/" . $event->id;
				$event->qr_ky = $request->getHttpHost() . "/ky/invitation/qr/" . $event->id;

				// 6. Сохранение
				$event->save();
			}
		}
		catch (\Throwable $th) {
			$this->destroy($event);
			dd('Возникла ошибка при загрузке файла на сервер:', $th);
		}

		return redirect()->route('bash.events.show', $event);
    }

	private function fileValidation($event, $file) {
		$reader = new Xlsx();
		$spreadsheet = $reader->load($file);
		$sheet = $spreadsheet->getActiveSheet();
		$worksheetInfo = $reader->listWorksheetInfo($file);
		$totalRows = $worksheetInfo[0]['totalRows'];
		
		$errors = [];
		$event_emails = $event->invitees()->pluck('email');
		$file_emails = [];

		for ($row = 2; $row <= $totalRows; $row++) {
			$input = [
				"number" => $sheet->getCell("A{$row}")->getValue(),
				"title_en" => $sheet->getCell("B{$row}")->getValue(),
				"title_ru" => $sheet->getCell("C{$row}")->getValue(),
				"full_name_ru" => $sheet->getCell("D{$row}")->getValue(),
				"full_name_en" => $sheet->getCell("E{$row}")->getValue(),
				"full_name_ky" => $sheet->getCell("E{$row}")->getValue(),
				"organization_ru" => $sheet->getCell("F{$row}")->getValue(),
				"job_ru" => $sheet->getCell("G{$row}")->getValue(),
				"organization_en" => $sheet->getCell("H{$row}")->getValue(),
				"job_en" => $sheet->getCell("I{$row}")->getValue(),
				"email" => $sheet->getCell("J{$row}")->getValue(),
				"languages" => $sheet->getCell("K{$row}")->getValue(),
				"duplication" => $sheet->getCell("L{$row}")->getValue(),
			];
			if (mb_strlen($input['email']) < 5) continue;

			if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
				$fileName = $file->getClientOriginalName();
				$errors [] = "В файле $fileName на строка №$row: не валидный формат email";
			}

			// если дубликация не разрешена то проверяется на уникальность
			if (!trim($input['duplication'])) {
				if ($event_emails->contains($input['email'])) {
					$fileName = $file->getClientOriginalName();
					$errors [] = "В файле $fileName на строка №$row: email адрес с таким названием уже зарегистрирован";
				}
	
				if (in_array($input['email'], $file_emails)) {
					$fileName = $file->getClientOriginalName();
					$errors [] = "В файле $fileName на строка №$row: email адрес дублируется внутри файла";
				} else {
					$file_emails [] = $input['email']; 
				}
			}

			
		}
		return $errors;
	}

	private function storeInvitees(Event $event, $file) {
		$reader = new Xlsx();
		$spreadsheet = $reader->load($file);
		$sheet = $spreadsheet->getActiveSheet();
		$worksheetInfo = $reader->listWorksheetInfo($file);
		$totalRows = $worksheetInfo[0]['totalRows'];

		for ($row = 2; $row <= $totalRows; $row++) {
			$input = [
				"number" => $sheet->getCell("A{$row}")->getValue(),
				"title_en" => $sheet->getCell("B{$row}")->getValue(),
				"title_ru" => $sheet->getCell("C{$row}")->getValue(),
				"full_name_ru" => $sheet->getCell("D{$row}")->getValue(),
				"full_name_en" => $sheet->getCell("E{$row}")->getValue(),
				"full_name_ky" => $sheet->getCell("E{$row}")->getValue(),
				"organization_ru" => $sheet->getCell("F{$row}")->getValue(),
				"job_ru" => $sheet->getCell("G{$row}")->getValue(),
				"organization_en" => $sheet->getCell("H{$row}")->getValue(),
				"job_en" => $sheet->getCell("I{$row}")->getValue(),
				"email" => $sheet->getCell("J{$row}")->getValue(),
				"languages" => "eng"
			];


			// валидация
			if (!$input['email']) 	continue;
			
			// создание и закрепление связи с событией
			$invitee = Invitee::create($input);
			$event->invitees()->save($invitee);

			// создание индивидуальной ссылки для потверждение рассылки
			$invitee->uniq_code = Hash::make($invitee->id . $invitee->email);
			$invitee->save();
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
		$pct = $event->getSendedPercentage(false);
		return view('bash.events.show', compact('event', 'pct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
		return view('bash.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
		// validate
		$validator = Validator::make($request->all(), [
			'title_en' => 'bail|required_without_all:title_ru,title_ky',
			'title_ru' => 'bail|required_without_all:title_en,title_ky',
			'title_ky' => 'bail|required_without_all:title_en,title_ru'
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
        }

		$event->update($request->except(['file_invitees']));

		// 1. Загрузка файла на сервер
		try {
			$file = $request->file('file_invitees');

			if($file) {
				// 1. Валидация файла
				$errors = $this->fileValidation($event, $file);

				if (count($errors) > 0 ){
					for ($i = 0, $len = count($errors); $i < $len; $i++) {
						$validator->errors()->add(
							$i + 1, $errors[$i]
						 );
					}
					return redirect()->back()->withErrors($validator)->withInput();
				}
				
				// 2. Сохранение данных из файла
				$this->storeInvitees($event, $file);

				// 3. Загрузка файла на сервер
				$dir  = config('global.event_invitees_directory');
				$filePath = UploadController::uploadFile($dir, $file);

				// 4. Сохранение пути к файлу
				$event->file_invitees = $filePath;

				// 5. Генерация QR ссылок
				$event->qr_en = $request->getHttpHost() . "/en/invitation/qr/" . $event->id;
				$event->qr_ru = $request->getHttpHost() . "/ru/invitation/qr/" . $event->id;
				$event->qr_ky = $request->getHttpHost() . "/ky/invitation/qr/" . $event->id;

				// 6. Сохранение
				$event->save();
			}
		}
		catch (\Throwable $th) {
			dd('Возникла ошибка при загрузке файла на сервер:', $th);
		}

		return redirect()->route('bash.events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
		UploadController::deleteFile($event->file_invitees);
        $event->delete();

		Route::dispatchToRoute(Request::create(url()->previous()));
        $previousRoute = Route::currentRouteName();

        if($previousRoute == 'bash.events.show'){
            return redirect()->route('bash.index');
        }else{
            return response('Success', 200);
        }
    }
	
}
