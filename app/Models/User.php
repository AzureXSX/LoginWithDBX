<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User
{
    private $Id;
    private $UserName;
    private $UserEmail;
    private $UserImage;  

    public function __construct($UserEmail, $UserName, $UserImage)
    {
        $this->UserEmail = $UserEmail;
        $this->UserName = $UserName;
        $this->UserImage = $UserImage;
    }

    public function Id() { return $this->Id; }
    public function UserName() { return $this->UserName; }
    public function UserEmail() { return $this->UserEmail; }
    public function UserImage() { return $this->UserImage; }

    public function jsonx() {
        return [
            'Id' => $this->Id(),
            'UserName' => $this->UserName(),
            'UserEmail' => $this->UserEmail(),
            'UserImage' => $this->UserImage(),
        ];
    }
}
