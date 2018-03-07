<?php
/**
 * Created by PhpStorm.
 * User: seniha.miminevska
 * Date: 15-Jun-17
 * Time: 16:54
 */

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('dashboard');
    }
}