<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\menuRequest;
use App\Models\Menu;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    
    $menus = Menu::buscar($filtro)->paginate(5);

    if ($request->ajax()) {
      return response()->json(view('menu.index.include.tablaMenus', 
        ['menus' => $menus])->render());
    }

    return view('menu.index.index', ['menus'  =>  $menus]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(menuRequest $request){
    Menu::create($request->all());

    return response()->json([]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
