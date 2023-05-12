<?php

namespace App\Http\Controllers;
use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class File extends Controller
{
    public function index_fileuuid(string $file_uuid)
    {
        @session_start();
        if (isset($_SESSION['sessionUsername']) && isset($_SESSION['sessionID']))
        {
            $filename = Files::where('uuid', '=', $file_uuid)->first()->name ?? redirect('/file')->with('error', "Le fichier n'éxiste pas.")->send();
            $fileownerid = Files::where('uuid', '=', $file_uuid)->first()->ownerid;
            $file = fopen("usersfiles/$fileownerid/$filename".".c", "r");
            $filecontent = fread($file, "999999");
            $fileuuid = $file_uuid;

            if ($file_uuid =! null)
            {
                $sessionUsername = $_SESSION['sessionUsername'];
                $sessionID = $_SESSION['sessionID'];
    
                if ($fileownerid == $sessionID)
                {
                    $file = Files::all();

                    return view('ide', [
                        'sessionUsername'=>$sessionUsername,
                        'sessionID'=>$sessionID,
                        'filename'=>$filename,
                        'filecontent'=>$filecontent,
                        'fileownerid'=>$fileownerid,
                        'fileuuid'=>$fileuuid,
                        'file'=>$file,
                    ]);
                }
                else
                {
                    redirect('/file')->with('error', 'Ce fichier ne vous appartient pas.')->send();
                }
            }
            else
            {
                redirect('/file')->send();
            }
        }
        else
        {
            redirect()->to('/login')->send();
        }
    }

    public function index_filemanagement()
    {
        @session_start();

        $userfiles = Files::all();

        return view('file_management', [
            'userfiles'=>$userfiles,
        ]);
    }

    public function createFile(Request $req)
    {
        @session_start();
        $fileuuid = uniqid();

        $file = new Files();
        $file->name = $req->input('filename');
        $file->uuid = $fileuuid;
        $file->ownerid = User::where('name', '=', $_SESSION['sessionUsername'])->first()->id;
        $file->save();

        $filename = $req->input('filename');
        $userid = $_SESSION['sessionID'];

        fopen("usersfiles/$userid/$filename".".c", "w");

        redirect("/file/$fileuuid")->with('success', 'Votre fichier à bien été créé.')->send();
    }

    public function saveFile(Request $req, string $file_uuid)
    {
        @session_start();
        $userid = $_SESSION['sessionID'];
        $filename = Files::where('uuid', $file_uuid)->first()->name;

        if ($file_uuid == null)
        {
            redirect()->back()->send();
        }
        else
        {
            if ($req->input('editor') == null)
            {
                redirect("/file/$file_uuid")->send();
            }
            else
            {
                $file = fopen("usersfiles/$userid/$filename".".c", "w");
                $file = fwrite($file, $req->input('editor'));

                redirect("/file/$file_uuid")->with('success', "Le fichier à bien été sauvegardé.")->send();
            }
        }
    }

    public function editNameFile(Request $req, String $file_uuid)
    {
        @session_start();

        $userid = $_SESSION['sessionID'];
        $filename = Files::where('uuid', $file_uuid)->first()->name.".c";
        $newfilename = $req->input('newname').".c";
        $checkPerm = DB::select('SELECT * FROM files WHERE uuid = ? AND ownerid = ?', [$file_uuid, $_SESSION['sessionID']]);

        if(count($checkPerm) >= 1)
        {
            //$file = fopen("usersfiels/$userid/$filename", "w");
            rename("usersfiles/$userid/$filename", "usersfiles/$userid/$newfilename");

            $file = Files::where('uuid', $file_uuid)->first();
            $file->name = $req->input('newname');
            $file->save();

            redirect()->back()->with("success", "Le nom de votre fichier à bien été changé.")->send();
        }
        else
        {
            redirect('/file')->with('error', 'Ce fichier ne vous appartient pas.')->send();
        }
    }  

    public function deleteFile(String $file_uuid)
    {
        @session_start();

        $userid = $_SESSION['sessionID'];
        $filename = Files::where('uuid', $file_uuid)->first()->name.".c";
        $checkPerm = DB::select('SELECT * FROM files WHERE uuid = ? AND ownerid = ?', [$file_uuid, $_SESSION['sessionID']]);

        if(count($checkPerm) >= 1)
        {
            DB::delete('DELETE FROM files WHERE files.uuid = ?', [$file_uuid]);
            unlink("usersfiles/$userid/$filename");
            redirect()->back()->with('success', 'Votre fichier à bien été supprimé.')->send();

        }
        else
        {
            redirect('/file')->with('error', 'Ce fichier ne vous appartient pas.')->send();
        }
    }
}
