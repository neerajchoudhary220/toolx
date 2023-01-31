<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;
use Illuminate\Support\Str;
class DbController extends Controller
{
    public function index()
    {
        $active = 'db';
        $dblist = DB::select("SHOW DATABASES");
        return view('db.index', compact('active', 'dblist'));
    }
}
