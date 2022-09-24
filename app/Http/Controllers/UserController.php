<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
                public function index(){
                  $users =App\User::All();
                  return view('User.index',compact($users));
                }

                public function create(){
                  return  view('User.create',compact($users));                 
                }

                public function store(Request $request){
                    App\User::create($request->all());
                     return redirect()->back();
                 }

                 public function edit( App\User $user){
                    return  view('User.edit',compact($users));                 
                }

                 public function update(Request $request){
                    App\User::update($request->all());
                    return redirect()->back();
                 }

                 public function delete(Request $request){
                    App\User::update($request->all());
                    return redirect()->back();
                 }
            }