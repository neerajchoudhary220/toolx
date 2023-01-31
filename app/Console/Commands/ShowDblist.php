<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use mysqli;
use PDO;

class ShowDblist extends Command
{

    protected $signature = 'show:dblist';


    protected $description = 'Command description';


    public function handle()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SHOW DATABASES";
        if($stmt = $conn->query("SHOW DATABASES")){
            // echo "No of records : ".$stmt->num_rows."<br>";
            while ($row = $stmt->fetch_assoc()) {
              echo $row['Database'];
              echo "\n";
            }
          }else{
          echo $conn->error;
          }
    }
}
