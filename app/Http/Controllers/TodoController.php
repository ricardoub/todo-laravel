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
  private $actions = array();


  private function getActions()
  {
    $actions['panelButton']['home']         = 'home';
    $actions['panelButton']['voltarIndex']  = 'todos.index';
    $actions['panelButton']['incluir']      = 'todos.create';
    $actions['panelButton']['editar']       = 'todos.edit';
    $actions['formButton']['cancelarIndex'] = 'todos.index';
    $actions['formButton']['cancelarShow']  = 'todos.show';
    $actions['tableButton']['exibir']       = 'todos.show';
    $actions['tableButton']['excluir']      = 'todos.delete';

    $actions['formAction']['index']       = 'todos.index';
    $actions['formAction']['store']       = 'todos.store';
    $actions['formAction']['update']      = 'todos.update';
    $actions['formAction']['destroy']     = 'todos.destroy';

    return $actions;
  }

  private function getOptions()
  {
    $options['formOption']['edit'] = 'disabled';

    return $options;
  }

  private function getMessages()
  {
    $messages['success']['store']  = 'Registro incluído com sucesso!';
    $messages['success']['update'] = 'Registro atualizado com sucesso!';
    $messages['success']['delete'] = 'Registro excluído com sucesso!';
    $messages['error']['find']     = 'Registro não localizado!';
    $messages['error']['delete']   = 'Falha ao excluir o registro!';

    return $messages;
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
    $comboOptions = $this->getComboOptions();
    $actions  = $this->getActions();
    $messages = $this->getMessages();

    $todos = Todo::where('user_id', Auth::user()->id)->orderby('priority')->paginate(10);

    return view('todos.index')
      ->with([
        'listModels'   => $todos,
        'actions'      => $actions,
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
    $comboOptions = $this->getComboOptions();
    $actions  = $this->getActions();
    $messages = $this->getMessages();
    $options  = $this->getOptions();
    $options['formOption']['edit'] = null;

    $todo = new \App\Todo();

    return view('todos.create')
      ->with([
        'formModel'    => $todo,
        'actions'      => $actions,
        'options'      => $options,
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
    $comboOptions = $this->getComboOptions();
    $actions  = $this->getActions();
    $messages = $this->getMessages();
    $options  = $this->getOptions();

    $todo = $this->findTodo($id);
    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErros([$formMessages['error']['find']]);
    }

    return view('todos.show')
      ->with([
        'formModel'    => $todo,
        'actions'      => $actions,
        'options'      => $options,
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
    $comboOptions = $this->getComboOptions();
    $actions  = $this->getActions();
    $messages = $this->getMessages();
    $options  = $this->getOptions();
    $options['formOption']['edit'] = null;

    $todo = Todo::find($id);
    if (is_null($todo)) {
      return redirect()->route($formActions['index'])
        ->withErros([$formMessages['error']['find']]);
    }

    return view('todos.edit')
      ->with([
        'formModel'    => $todo,
        'actions'      => $actions,
        'options'      => $options,
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
    $comboOptions = $this->getComboOptions();
    $actions  = $this->getActions();
    $messages = $this->getMessages();
    $options  = $this->getOptions();

    $todo = $this->findTodo($id);
    if (is_null($todo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors([$messages['error']['find']]);
    }

    return view('todos.delete')
      ->with([
        'formModel'    => $todo,
        'actions'      => $actions,
        'options'      => $options,
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
    $actions  = $this->getActions();
    $messages = $this->getMessages();

    $input = \Request::except('_token');
    extract($input);

    $todo = new \App\Todo();
    $todo->name       = $name;
    $todo->priority   = $priority;
    $todo->percentage = $percentage;
    $todo->status     = $status;
    $todo->user_id    = $user_id;
    $todo->save();

    return redirect()->route($actions['formAction']['index'])
      ->with('msgSuccess', $messages['success']['store']);
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
    $actions = $this->getActions();
    $messages = $this->getMessages();

    $input = \Request::all();
    extract($input);

    $todo = $this->findTodo($id);
    if (is_null($todo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors([$messages['error']['find']]);
    }

    $todo->name       = $name;
    $todo->priority   = $priority;
    $todo->percentage = $percentage;
    $todo->status     = $status;
    $todo->user_id    = $user_id;
    $todo->save();

    return redirect()->route($actions['formAction']['index'])
      ->with('msgSuccess', $messages['success']['update']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $actions  = $this->getActions();
    $messages = $this->getMessages();

    $todo = $this->findTodo($id);

    if (is_null($todo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors([$messages['error']['find']]);
    }

    $result = $todo->delete();
    if (!$result) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors([$messages['error']['delete']]);
    }

    return redirect()->route($actions['formAction']['index'])
      ->with('msgSuccess', $messages['success']['delete']);
  }
}
