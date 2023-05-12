<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Auth extends Controller
{
    public function register(Request $req)
    {
        session_start();

        $email_input = $req->input('email');
        $username_input = $req->input('username');
        $password_input = $req->input('password');

        $password_hash = password_hash($password_input, PASSWORD_DEFAULT);

        $checkemail = User::where('email', '=', $email_input)->get();
        $checkusername = User::where('name', '=', $username_input)->get();

        if (isset($email_input) && isset($password_input) && isset($username_input))
        {
            if (count($checkemail) == 0)
            {
                if (count($checkusername) == 0)
                {
                    $newuser = new User();
                    $newuser->email = $email_input;
                    $newuser->name = $username_input;
                    $newuser->password = $password_hash;
                    $newuser->save();
            
                    $_SESSION['sessionID'] = User::where('name', '=', "$username_input")->first()->id;
                    $_SESSION['sessionUsername'] = $username_input;

                    $userid = $_SESSION['sessionID'];

                    mkdir("usersfiles/$userid", 0777);
            
                    redirect(action([File::class, 'index_filemanagement']))->with('success', "Vous êtes connecté en tant que $username_input")->send();
                }
                else
                {
                    redirect()->back()->with('error', "Il y a déjà un compte avec ce pseudo.")->send();
                }
            }
            else
            {
                redirect()->back()->with('error', "Il y a déjà un compte avec cette adresse email.")->send();
            } 
        }
        else
        {
            redirect()->back()->with('error', "Vous devez remplir le formulaire.")->send();
        }
    }
    
    public function login(Request $req)
    {
        session_start();

        $email_input = $req->input('email');
        $password_input = $req->input('password');

        $apiuser = User::where('email', '=', $email_input)->get();

        $apiuserpassword = User::where('email', '=', $email_input)->first()->password ?? "";

        if(count($apiuser) > 0)
        {
            if (password_verify($password_input, $apiuserpassword))
            {
                $userid = User::where('email', '=', $email_input)->first()->id;
                $username = User::where('id', '=', $userid)->first()->name;

                $_SESSION['sessionID'] = $userid;
                $_SESSION['sessionUsername'] = $username;

                redirect(action([File::class, 'index_filemanagement']))->with('success', "Vous êtes connecté en tant que $username")->send();
            }
            else
            {
                redirect()->back()->with('error', "Le mot de passe est incorrect.")->send();
            }
        }
        else
        {
            redirect()->back()->with('error', "Il n'y a aucun compte qui éxiste avec cette adresse mail.")->send();
        }
    }

    public function disconnect()
    {
        @session_start();
        session_destroy();

        redirect("/login")->send();
    }

    public function protect_register()
    {
        redirect()->to("/register")->with('error', "Vous devez remplir le formulaire.")->send();
    }

    public function protect_login()
    {
        redirect()->to("/login")->with('error', "Vous devez remplir le formulaire.")->send();
    }
}
