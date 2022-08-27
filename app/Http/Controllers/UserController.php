<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
                        public function index(){
                      $Users =App\User::All();
                      return view('User.index',compact(Users));
                        }
                    }