<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
     public function login()
    {
        return view('auth/login');
    }

    public function loginSubmit()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        // Set session
        $session->set([
            'user_id' => $user['id'],
            'name'    => $user['name'],
            'email'   => $user['email'],
            'logged_in' => true
        ]);

        return redirect()->to('/employees');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerSubmit()
    {
        $userModel = new UserModel();

        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Account created! Login now.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
