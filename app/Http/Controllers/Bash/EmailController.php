<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class EmailController extends Controller
{
      public function index(Request $request) {
        if($request->ajax()){
            $data = Email::get()->sortBy('id');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('email', function ($row) {
                    return $row->email;
                })
				->addColumn('host', function ($row) {
                    return $row->host;
                })
				->addColumn('encryption', function ($row) {
                    return $row->encryption;
                })
				->addColumn('port', function ($row) {
                    return $row->port;
                })
                ->addColumn('action', function ($row) {

                    $can_edit = '<a href="'.route('bash.emails.edit', $row->id).'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary" title="Редактировать">
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

                    $can_delete = '<a href="'.route('bash.emails.destroy', $row).'" data-id="'.$row->id.'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-to-alert" title="Удалить">
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
                    $show = '<a href="'.route('bash.emails.show', $row->id).'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Просмотреть">
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

                    return $show . ' ' . $can_edit . ' ' . $can_delete;
					//return $can_delete;
                })
                ->rawColumns(['action']) // делает строку как html
                ->make(true);
        }
        return view('bash.emails.index');
    }

    public function create() {
        $email = new Email();
        return view('bash.emails.create', compact('email'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
				'mailer'                  	=> "required",
				'host'                  	=> "required",
				'port'                  	=> "required|numeric",
				'email'                  	=> "required|email|unique:emails,email",
				'password'                  => "required|min:6",
				'password_confirmation' 	=> 'required_with:password|same:password|min:6'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
		
		$sender = Email::create($request->except('password'));
		$sender->password = encrypt($request->password);
		$sender->save();
        
        return redirect()->route('bash.emails.index');
    }

    public function edit(Email $email) {
        return view('bash.emails.edit', compact('email'));
    }

    public function update(Request $request, Email $email)
    {
		$data = $request->all();
		$validator = Validator::make($data, [
			'mailer'                  	=> "required",
			'host'                  	=> "required",
			'port'                  	=> "required|numeric",
			'host'                  	=> "required",
			'encryption'                => "required",
			'email'                  	=> "required|unique:emails,email," .$email->id,
		]);

		if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $email->update($request->all());
        $email->save();

        return redirect()->route('bash.emails.show', $email);
    }

	public function show(Email $email)
    {
        return view('bash.emails.show', compact('email'));
    }

    public function destroy(Email $email) {
        Route::dispatchToRoute(Request::create(url()->previous()));
        $route = Route::currentRouteName();
		$this->unset($email);
        $email->delete();

        if($route == 'bash.emails.show'){
            return redirect()->route('bash.emails.index');
        }else{
            return response('Success', 200);
        }
    }

	public function put_permanent_env($key, $value) {
		$path = app()->environmentFilePath();
		
        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
           "{$key}={$value}",
           file_get_contents($path)
        ));
	}

		
	public function set(Request $request) {
		$sender = Email::where('email', $request->input('email'))->first();

		$this->put_permanent_env('MAIL_MAILER', $sender->mailer);
		$this->put_permanent_env('MAIL_HOST', $sender->host);
		$this->put_permanent_env('MAIL_PORT', $sender->port);
		$this->put_permanent_env('MAIL_USERNAME', $sender->email);
		$this->put_permanent_env('MAIL_PASSWORD', decrypt($sender->password));
		$this->put_permanent_env('MAIL_ENCRYPTION',  $sender->encryption);
		$this->put_permanent_env('MAIL_FROM_ADDRESS',  $sender->from_address);
		$this->put_permanent_env('MAIL_FROM_NAME',  $sender->from_name);
		

		if ($request->ajax()) {
			return "success";
		} 

		return redirect()->route('bash.index');
    }

	public function unset(Email $email) {
		if ($email->email == env('MAIL_USERNAME')) {
			$this->put_permanent_env('MAIL_MAILER', "");
			$this->put_permanent_env('MAIL_HOST', "");
			$this->put_permanent_env('MAIL_PORT', "");
			$this->put_permanent_env('MAIL_USERNAME', "");
			$this->put_permanent_env('MAIL_PASSWORD', "");
			$this->put_permanent_env('MAIL_ENCRYPTION',  "");
			$this->put_permanent_env('MAIL_FROM_ADDRESS',  "");
			$this->put_permanent_env('MAIL_FROM_NAME',  "");
		}
    }
}
