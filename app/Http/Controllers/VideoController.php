<?php

namespace App\Http\Controllers;

class VideoController extends Controller
{
    function view($id)
    {
        return view('video', ['video' => $id]);
    }
}
