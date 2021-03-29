<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;


class FrontController extends Controller
{

  public function index()
  {
    $token = env("API_TOKEN");
    $req = Request::create('/api/Tareas', 'GET');
    $req->headers->set('Authorization', 'Bearer '.$token);

    $res = app()->handle($req);

    $tareas = $res->getContent();

    $tareas_2 = json_decode($tareas, true);

    return view('welcome', compact('tareas_2'));
  }

  public function store(Request $request)
  {
    $token = env("API_TOKEN");
    $data = [
      'nombre' => $request['nombre'],
      'descripcion' => $request['descripcion']
    ];

    $req = Request::create('/api/Tareas', 'POST', $data);
    $req->headers->set('Authorization', 'Bearer '. $token);

    $res = app()->handle($req);

    return $this->index();;

  }

  public function edit($id)
    {

      $tarea = Tareas::findOrFail($id);
      return view('actualizar', compact('tarea'));

    }

  public function update(Request $request)
  {
    $token = env("API_TOKEN");
    $id = $request['id'];

    $req = Request::create('/api/Tareas/'. $id, 'PUT', $data = [
      'nombre' => $request['nombre'],
      'descripcion' => $request['descripcion']
    ]);

    $req->headers->set('Authorization', 'Bearer '. $token);

    $res = app()->handle($req);
    return $this->index();
  }
}
