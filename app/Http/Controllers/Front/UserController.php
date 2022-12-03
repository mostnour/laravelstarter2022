<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function showUserName(){
        return 'Ahmed Emam';
    }

    public function getIndex(){
        // return view('welcome');

        // For huge data
        $data = [];
        $data['id'] = 5;
        $data['name'] = 'Moustafa Abuelnour';
        $data['sex'] = 'Male';
        $data['age'] = 47;
        $data['position'] = 'Software department offcier';
        $data['companyname'] = 'Egypt Foods Group';
        $data['sectorname'] = 'Information Technology';
        return view('welcome', $data);
    }

    public function getObject(){
        $obj = new \stdClass();
        $obj -> id = 5;
        $obj -> name = 'Mustafa Gaber';
        $obj -> age = '47';
        $obj -> sex = 'Male';
        $obj -> position = 'Software Department Officer';

        // Using PHP function compact:
        return view('welcomeobj', compact('obj'));
    }
}
