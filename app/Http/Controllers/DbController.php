<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserX;

class DbController extends Controller
{
    private $serverName;
    private $connectionOptions;
    protected $connection;

    protected $isInit = false;

    protected function Connect(){
        $this->connection = sqlsrv_connect($this->serverName, $this->connectionOptions);
    }

    protected function DisConnect(){
        sqlsrv_close($this->connection);
    }


    
    public function ExecQuery(string $query){

        $data = array();

        $result = sqlsrv_query($this->connection, $query);

        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        };
        return $data;
    }


    public function ExecuteQuery(string $query){

        $result = sqlsrv_query($this->connection, $query);

        $data = array();

        if( $result === false ) {
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    $data[] = "SQLSTATE: ".$error[ 'SQLSTATE']."";
                    $data[]  = "code: ".$error[ 'code']."";
                    $data[] = "message: ".$error[ 'message']."";
                }
            }
            return false;
        }
        else{
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            };

            return $data;
        }

       
    }

    protected function Init(){
        $this->serverName = env("DB_HOST");

        $this->connectionOptions = array(
            "Database" => env("DB_DATABASE"),
            "Uid" => env("DB_USERNAME"),
            "PWD" => env("DB_PASSWORD")
        );

        $this->isInit = true;
    }
}
