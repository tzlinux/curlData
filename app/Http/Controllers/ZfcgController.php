<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: tredon
 * Date: 2017/7/19
 * Time: 20:00
 */
class ZfcgController extends Controller
{
    public function index()
    {
        return view('zfcg');
    }
}