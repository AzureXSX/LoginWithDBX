<?php

namespace App\Models;

use App\Http\Controllers\DbController;
use Illuminate\Http\Request;

class UserX extends DbController
{
    public static $currentUser;

    public function __construct()
    {
        $this->Init();
        $this->Connect();
    }

    public function __destruct()
    {
        $this->DisConnect();
    }

    public function GetUsers()
    {
        if (!$this->isInit) {
            $this->Init();
        }

        $this->Connect();

        $result = $this->ExecQuery("SELECT * FROM dbo.Users WHERE UserName = 'SUCCESS'");

        $this->DisConnect();

        return view("Signup", ['data' => $result]);
    }

    public function Login(Request $request)
    {

        $this->Connect();

        $query = "SELECT * FROM [dbo].[Users] WHERE (UserEmail = '" . $request->input('userEmail') . "' OR UserName = '" . $request->input('userEmail') . "') AND UserPassword ='". $request->input('userPassword') . "';" ;

        $result = $this->ExecQuery($query);

        if ($result && count($result) > 0) {
            session()->forget("UserX");
            
            $user = new User( $result[0]["UserEmail"],  $result[0]["UserName"],  $result[0]["UserImage"]);
            
            session(['UserX' => $user]);
            echo json_encode(['status' => $result, 'xux' => $query]);
        } else {
            echo json_encode(['status' => $result, 'uwux' => $query]);
        }
        $this->DisConnect();
    }

    public function LoginX(Request $request)
    {

        $this->Connect();

        $query = "SELECT * FROM [dbo].[Users] WHERE UserEmail = '" . $request->input('userEmail') . "' OR UserName = '" . $request->input('userEmail') . "'";

        $result = $this->ExecQuery($query);

        if ($result && count($result) > 0) {
            
            $user = new User( $result[0]["UserEmail"],  $result[0]["UserName"],  $result[0]["UserImage"]);
            
            echo json_encode(['user' => $user->jsonx(), 'count' => count($result)]);
        } else {
            echo json_encode(['status' => $result]);
        }
        $this->DisConnect();
    }

    public function SignUpX(Request $request)
    {
        $this->Connect();

        $hexString = "0x";
        $hexString .= bin2hex($request->input("userImage"));

        $query = "INSERT INTO [dbo].[Users] VALUES
            (
            '" . $request->input("userName") . "',
            '" . $request->input("userEmail") . "',
            '" . $request->input("userPassword") . "',
            " . $hexString . ")";

        $result = $this->ExecuteQuery($query);

        

        if($result)
        {
            // session()->forget("UserName");
            // session()->forget("UserImage");
            
            // session()->push("UserName", $result[0]["UserName"]);
            // session()->push("UserImage", $result[0]["UserImage"]);
        }
       
        echo json_encode(['status'=> $result]);

        $this->DisConnect();

    }

    public function MainPage()
    {
        return view("Posts", ['data' => session('UserName')]);
    }

    public function IsAuth()
    {
        return view('Login');
    }


    public function UpdateX(Request $request){
        $this->Connect();



        $this->DisConnect();
    }

    public function CreatePost(Request $request){

    }

    public function SignUp(Request $request){
        return view('Signup');  
    }
}
