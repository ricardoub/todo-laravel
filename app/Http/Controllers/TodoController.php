<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Todo;

class TodoController extends Controller
{

  private function getButtonHrefs()
  {
    $buttonHrefs['home']     = 'home';
    $buttonHrefs['listar']   = 'todos.index';
    $buttonHrefs['incluir']  = 'todos.create';
    $buttonHrefs['exibir']   = 'todos.show';
    $buttonHrefs['editar']   = 'todos.edit';
    $buttonHrefs['cancelar'] = 'todos.show';

    return $buttonHrefs;
  }

  private function getFormActions()
  {
    $formActions['edit']    = 'disabled';
    $formActions['index']   = 'todos.index';
    $formActions['store']   = 'todos.store';
    $formActions['update']  = 'todos.update';
    $formActions['destroy'] = 'todos.destroy';

    return $formActions;
  }

  private function findCombo($id) {
    return Combo::find($id);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $buttonHrefs  = $this->getButtonHrefs();
    $todos = Todo::where('user_id', Auth::user()->id)->paginate(10);
    //return view('todos.index')->with(compact('todos'));
    return view('todos.index')
      ->with([
        'listModels'  => $todos,
        'buttonHrefs' => $buttonHrefs,
      ]);

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
    public function store(Request $request)
    {
        //
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $buttonHrefs  = $this->getButtonHrefs();
    $formActions  = $this->getFormActions();

    $todo = Todo::find($id);
    if (is_null($todo)) {
      return redirect()->route('todos.index')
        ->withErros(['Registro não localizado']);
    }

    return view('todos.show')
      ->with([
        'formModel'    => $todo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $buttonHrefs  = $this->getButtonHrefs();
    $formActions  = $this->getFormActions();
    $formActions['edit'] = null;

    $todo = Todo::find($id);
    if (is_null($todo)) {
      return redirect()->route('todos.index')
        ->withErros(['Registro não localizado']);
    }

    return view('todos.show')
      ->with([
        'formModel'    => $todo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
      ]);
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
