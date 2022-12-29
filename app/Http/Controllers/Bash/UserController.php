<?php

namespace App\Http\Controllers\Bash;

use App\Models\Department;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Contracts\DataTable;
use Spatie\Permission\Models\Role;


// use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function __construct()
    {
        /*
        $this->middleware('permission:halls-index');
        $this->middleware('permission:halls-create', ['only' => ['create','store']]);
        $this->middleware('permission:halls-update', ['only' => ['edit','update']]);
        $this->middleware('permission:halls-delete', ['only' => ['destroy']]);
        */

        $this->middleware('role:Администратор');
    }

    public function index()
    {

        if(request()->ajax()){
            $data = User::get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('bash.users.show', $row->id).'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Просмотреть">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <a href="'.route('bash.users.edit', $row->id).'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Редактировать">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>\
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <a href="'.route('bash.users.destroy', $row).'" data-id="'.$row->id.'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 btn-to-alert" title="Удалить">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </a>';
                })
                ->addColumn('department', function($row) {
                    return $row->getDepartment();
                })
                ->addColumn('role', function ($row) {
                    if(!empty($row->getRoleNames())){
                        return '<span class="text-primary">'. $row->getRoleName() .'</span>';
                    }else{
                        return '-';
                    }
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }

        return view('bash.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row  = new User;
        $roles = Role::get()->sortBy('name')->pluck('name','id')->toArray();
        $departments = Department::get()->sortBy('name')->pluck('name','id')->toArray();

        return view('bash.users.create', compact('row', 'roles', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,
            [
                'roles'                 => 'required',
                'name'                  => 'required|min:2|max:200',
                'login'                 => 'required|min:3|max:100|unique:users',
                'password'              => 'required|min:6|max:30',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'roles.required'                => 'Нужно выбрать роль пользователя',
                'name.required'                 => 'Нужно ввести имя пользователя',
                'name.min'                      => 'ФИО не может быть меньше 2 символов',
                'name.max'                      => 'ФИО не может превышать 200 символов',
                'login.required'                => 'Нужно ввести имя пользователя',
                'login.min'                     => 'Логин не может быть меньше 3 символов',
                'login.max'                     => 'Логин не может превышать 100 символов',
                'login.unique'                  => 'Пользователь с таким логином уже существует',
                'password.required'             => 'Требуется ввести пароль',
                'password.min'                  => 'Пароль не может быть меньше 6 символов',
                'password.max'                  => 'Пароль не может превышать 30 символов',
                'password_confirmation.same'    => 'Введенные пароли не совпадают'
            ]
        );
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $row = User::create($data);
        $row->password = Hash::make($data['password']);
        //$row->remember_token = Str::random(10);

        // $row->login = $row->region_id['region_id'].'-'.$row->id;
        // $row->password = Hash::make($row->region_id['region_id'].'-'.$row->id);
        $row->assignRole($request->roles);
        $row->save();

        return redirect()->route('bash.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('bash.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get()->sortBy('name')->pluck('name','id')->toArray();
        $departments = Department::get()->sortBy('name')->pluck('name','id')->toArray();

        return view('bash.users.edit',compact('user', 'roles', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,
            [
                'roles'                 => 'required',
                'name'                  => 'required|min:2|max:255',
                'login'                 => "required|min:3|max:100|unique:users,login,$user->id"
            ],
            [
                'roles.required'                => 'Нужно выбрать роль пользователя',
                'name.required'                 => 'Нужно ввести имя пользователя',
                'name.min'                      => 'ФИО не может быть меньше 2 символов',
                'name.max'                      => 'ФИО не может превышать 200 символов',
                'login.required'                => 'Нужно ввести имя пользователя',
                'login.min'                     => 'Логин не может быть меньше 3 символов',
                'login.max'                     => 'Логин не может превышать 100 символов',
                'login.unique'                  => 'Пользователь с таким логином уже существует',
            ]
        );

        $user->update($request->all());
        $user->password = \Hash::make($request->password);
        $user->save();

        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        $user->assignRole($request->roles);

        return redirect()->route('bash.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Route::dispatchToRoute(Request::create(url()->previous()));
        $route = Route::currentRouteName();

        $user->delete();

        if($route == 'bash.users.show'){
            return redirect()->route('bash.users.index');
        }else{
            return response('Success', 200);
        }
    }
}
