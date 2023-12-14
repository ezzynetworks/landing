<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
  public function isAdmin ()
  {
    if (Auth::user() == null) return null;

    $isAdmin = Auth::user()->user_type == 'admin';
    return $isAdmin;
  }

  public function index (Request $request)
  {
    if ($this->isAdmin() == null || $this->isAdmin() != true ) return abort(404);

    $contents = Content::first()->contents ?? null;

    return Inertia::render('Admin/Dashboard')->with([
      "contents" => $contents
    ]);
  }

  public function storeContent (Request $request)
  {
    $request->validate([
      "content" => ["required", "string"]
    ]);

    Content::updateOrCreate(["id" => 1], [
      "contents" => $request->content,
      "modified_by" => "admin"
    ]);

    return redirect()->back()->with([
      "success" => "Contenido modificado"
    ]);
  }
}
