<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoFormRequest;
use Auth;

use App\User;
use App\Todo;
use App\Combo;

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

  private function getFormMessages()
  {
    $formMessages['success']['store']  = 'Registro incluído com sucesso!';
    $formMessages['success']['update'] = 'Registro atualizado com sucesso!';
    $formMessages['success']['delete'] = 'Registro excluído com sucesso!';
    $formMessages['error']['find']     = 'Registro não localizado!';
    $formMessages['error']['delete']   = 'Falha ao excluir o registro!';
  }

  private function getComboOptions()
  {
    $combo = new Combo();
    $comboOptions['users']     = $combo->usersForSelect();
    $comboOptions['simnao']    = $combo->optionsForSelect('simnao');
    $comboOptions['status']    = $combo->optionsForSelect('status');
    $comboOptions['percent10'] = $combo->optionsForSelect('percent10');

    return $comboOptions;
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
    $comboOptions = $this->getComboOptions();

    $todos = Todo::where('user_id', Auth::user()->id)->orderby('priority')->paginate(10);
    return view('todos.index')
      ->with([
        'listModels'  => $todos,
        'buttonHrefs' => $buttonHrefs,
        'comboOptions' => $comboOptions,
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $buttonHrefs  = $this->getButtonHrefs();
      $formActions  = $this->getFormActions();
      $comboOptions = $this->getComboOptions();
      $formActions['edit'] = null;

      $todo = new \App\Todo();

      return view('todos.create')
        ->with([
          'formModel'    => $todo,
          'formActions'  => $formActions,
          'buttonHrefs'  => $buttonHrefs,
          'comboOptions' => $comboOptions,
        ]);
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
    $comboOptions = $this->getComboOptions();

    $todo = $this->findTodo($id);
    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErros([$formMessages['error']['find']]);
    }

    return view('todos.show')
      ->with([
        'formModel'    => $todo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
        'comboOptions' => $comboOptions,
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
    $comboOptions = $this->getComboOptions();
    $formActions['edit'] = null;

    $todo = Todo::find($id);
    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErros([$formMessages['error']['find']]);
    }

    return view('todos.edit')
      ->with([
        'formModel'    => $todo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
        'comboOptions' => $comboOptions,
      ]);
  }

  /**
   * Display the specified resource to destroy.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    $formActions  = $this->getFormActions();
    $buttonHrefs  = $this->getButtonHrefs();
    $comboOptions = $this->getComboOptions();

    $todo = $this->findTodo($id);
    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErrors([$formMessages['error']['find']]);
    }

    return view('todos.delete')
      ->with([
        'formModel'    => $todo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
        'comboOptions' => $comboOptions,
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TodoFormRequest $request)
  {
    $formActions  = $this->getFormActions();
    $formMessages = $this->getFormMessages();
    $input = \Request::except('_token');
    extract($input);

    $todo = new \App\Todo();
    $todo->name       = $name;
    $todo->priority   = $priority;
    $todo->percentage = $percentage;
    $todo->status     = $status;
    $todo->user_id    = $user_id;
    $todo->save();

    return redirect()->route($formActions['index'])
      ->with('msgSuccess', $formMessages['success']['store']);
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
    $formMessages = $this->getFormMessages();
    $input = \Request::all();
    extract($input);

    $todo = $this->findTodo($id);
    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErrors([$formMessages['error']['find']]);
    }

    $todo->name       = $name;
    $todo->priority   = $priority;
    $todo->percentage = $percentage;
    $todo->status     = $status;
    $todo->user_id    = $user_id;
    $todo->save();

    return redirect()->route($formActions['index'])
      ->with('msgSuccess', $formMessages['success']['update']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $formActions  = $this->getFormActions();
    $formMessages = $this->getFormMessages();

    $todo = $this->findTodo($id);

    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErrors([$formMessages['error']['find']]);
    }

    $result = $todo->delete();
    if (!$result) {
      return redirect()->route($formActions['index'])
        ->withErrors([$formMessages['error']['delete']]);
    }

    return redirect()->route($formActions['index'])
      ->with('msgSuccess', $formMessages['success']['delete']);
  }
}
