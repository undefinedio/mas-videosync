<?php

namespace App\Http\Controllers;

class VideoController extends Controller
{
    function view($cluster, $id)
    {
        return view('video', ['cluster' => $cluster, 'video' => $id]);
    }
}
