<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LandingController extends Controller
{
  public function index (Request $request)
  {
    $contents = Content::first()->contents ?? null;

    return Inertia::render('App')->with([
      "contents" => $contents
    ]);
  }
}
