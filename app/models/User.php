<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    protected $table = 'users';
    protected $hidden = array('password', 'remember_token');
    protected $guarded = array('id', 'password');
    protected $fillable = array('username', 'password', 'name', 'email', 'phone');
    public static $rules = array(
        'username' => 'required|unique:users',
        'email' => 'required|email',
        'password' => 'required|same:password_confirmation'
    );
    public static $rules_edit = array(
        'email' => 'required|email',
    );
    public static $form = array(
        'route' => 'users.store',
        'submit' => 'Save',
        'fields' => array(
            array(
                'type' => 'text',
                'label' => 'Name',
                'name' => 'name',
            ),
            array(
                'type' => 'text',
                'label' => 'Username',
                'name' => 'username',
            ),
            array(
                'type' => 'password',
                'label' => 'Password',
                'name' => 'password',
            ),
            array(
                'type' => 'password',
                'label' => 'Confirm password',
                'name' => 'password_confirmation',
            ),
            array(
                'type' => 'email',
                'label' => 'Email',
                'name' => 'email',
            ),
            array(
                'type' => 'text',
                'label' => 'Phone',
                'name' => 'phone',
            ),
        )
    );

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

    public static function prepare_form() {
        $form = self::$form;
        $new_fields = array();
        foreach ($form['fields'] as $value) {
            if (!isset($value['name'])) {
                continue;
            }
            $new_fields[$value['name']] = $value;
        }
        $form['fields'] = $new_fields;
        return $form;
    }

    public static function prepare_edit_form() {
        $form = self::prepare_form();
        $form['route'] = 'users.update';
        $form['submit'] = 'Save Changes';
        $non_required_fields = array('password', 'password_confirmation');
        $non_required_fields = array_fill_keys($non_required_fields, '');
        $form['fields'] = array_diff_key($form['fields'], $non_required_fields);
        return $form;
    }
    
    

}
