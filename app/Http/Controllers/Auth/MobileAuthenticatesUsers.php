<?php
namespace App\Http\Controllers\Auth;

trait MobileAuthenticatesUsers
{
    protected function credentials(\Illuminate\Http\Request $request)
    {
        $login = $request->input($this->username());
        
        // Determine if login is mobile number or email
        $field = strlen($login) === 11 ? 'mobile_no' : 'email';
        
        return [
            $field => $login,
            'password' => $request->input('password'),
        ];
    }

    public function username()
    {
        return 'login';
    }
}