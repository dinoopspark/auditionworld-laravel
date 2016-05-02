<?php

class UsersController extends BaseController {
    
    
    
    public function index() {
        $users = User::paginate(10);
        return View::make('users.index', compact('users'));
    }

    
    public function create() {
        $form = User::$form;
        return View::make('users.create', compact('form'));
    }
    
    public function store() {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes()) {

            $input['password'] = Hash::make($input['password']);

            User::create($input);

            return Redirect::route('users.index');
        }

        return Redirect::route('users.create')
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }

   
    public function show($id) {
        $user = User::find($id);
        if (is_null($user)) {
            return Redirect::route('users.index');
        }
        return View::make('users.show', compact('user'));
    }

   
    public function edit($id) {
        $user = User::find($id);
        if (is_null($user)) {
            return Redirect::route('users.index');
        }
        $form = User::prepare_edit_form();
        $form['method'] = 'PATCH';
        $form['model'] = $user;
        return View::make('users.edit', compact('user', 'form'));
    }

   
    public function update($id) {

        $input = Input::all();
        $validation = Validator::make($input, User::$rules_edit);

        if ($validation->passes()) {
            $user = User::find($id);
            $user->update($input);
            return Redirect::route('users.index');
        }

        return Redirect::route('users.edit', $id)
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }


    public function destroy($id) {
        User::find($id)->delete();
        return Redirect::route('users.index');
    }
    
    // custom function 

    public function login() {

        $input = Input::all();

        if (isset($input['username'], $input['password'])) {

            if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password']))) {
                return Redirect::to('profile');
            }
        }

        if (Auth::check()) {
            return Redirect::to('profile');
        } else {
            //  login page
            return View::make('users.login');
        }
    }
    
    function logout() {
        Auth::logout();
        return Redirect::route('users.index');
    }

    function profile() {
        return View::make('users.profile');
    }
    
 

}
