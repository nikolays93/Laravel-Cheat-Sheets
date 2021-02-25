<?php

use Illuminate\Http\Request;

$request = Request::instance();

// http://127.0.0.1:8000/admin?param1=1
$request->method(); //: GET
$request->path(); //: admin
$request->url(); //: http://127.0.0.1:8000/admin
$request->fullUrl(); //: http://127.0.0.1:8000/admin?param1=1
$request->fullUrlWithQuery(['param2' => 2]); //: http://127.0.0.1:8000/admin?param1=1&param2=2
$request->is('admin/*'); //: false

$request->ajax(); //: false
$request->has('param1'); //: true
$request->keys(); //: [0 => "param1"]
$request->all(); //: ["param1" => "1"]
$request->input('param1', 'def'); //: "1"
$request->get('param2', 'def'); //: "def"
$request->hasFile('param3'); //: false

$file = $request->file('param3', 'def'); //: "def"
$file->path();
$file->extension();
$file->getClientOriginalName();
