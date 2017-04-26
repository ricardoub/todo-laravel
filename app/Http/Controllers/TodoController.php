<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoFormRequest;
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
    $buttonHrefs['excluir']  = 'todos.delete';
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

  private function findTodo($id)
  {
    return Todo::find($id);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $buttonHrefs  = $this->getButtonHrefs();

    $todos = Todo::where('user_id', Auth::user()->id)->orderby('priority')->paginate(10);
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

    $todo = $this->findTodo($id);
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

    return view('todos.edit')
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
    public function update(TodoFormRequest $request, $id)
    {
      $formActions = $this->getFormActions();
      $input = \Request::all();
      extract($input);

      $todo = $this->findTodo($id);
      if (is_null($todo)) {
        return redirect()->route($formActions['index'])
          ->withErrors(['Registro não localizado!']);
      }

      $todo->name       = $name;
      $todo->priority   = $priority;
      $todo->percentage = $percentage;
      $todo->save();

      return redirect()->route($formActions['index'])
        ->with('msgSuccess', "Registro atualizado com sucesso!");
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
