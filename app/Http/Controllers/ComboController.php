<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComboFormRequest;

use App\Combo;

class ComboController extends Controller
{

  private function getButtonHrefs()
  {
    $buttonHrefs['home']     = 'home';
    $buttonHrefs['listar']   = 'combos.index';
    $buttonHrefs['incluir']  = 'combos.create';
    $buttonHrefs['excluir']  = 'combos.delete';
    $buttonHrefs['exibir']   = 'combos.show';
    $buttonHrefs['editar']   = 'combos.edit';
    $buttonHrefs['cancelar'] = 'combos.show';


    return $buttonHrefs;
  }

  private function getFormActions()
  {
    $formActions['edit']    = 'disabled';
    $formActions['index']   = 'combos.index';
    $formActions['store']   = 'combos.store';
    $formActions['update']  = 'combos.update';
    $formActions['destroy'] = 'combos.destroy';

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
    $combos = Combo::paginate(10);

    //return view('admin.combos.index')->with(compact('combos'));
    return view('admin.combos.index')
      ->with([
        'listModels'  => $combos,
        'buttonHrefs' => $this->getButtonHrefs(),
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
    $formActions['edit'] = null;
    $combo = new \App\Combo();

    return view('admin.combos.create')
      ->with([
        'formModel'    => $combo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
      ]);

      /*
      $todo = new \Todo\Todo();
      $todo->name = null;
      $todo->order = null;
      $todo->percentage = null;
      $todo->important = null;
      $todo->urgent  = null;
      $todo->user_id = $user->id;

      return view('todos.create')
        ->with(compact('formEdit','todo', 'comboOptions'));
      */
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ComboFormRequest $request)
  {
    $formActions = $this->getFormActions();
    $input = \Request::except('_token');
    extract($input);

    $combo = new \App\Combo();
    $combo->name = $name;
    $combo->option = $option;
    $combo->value = $value;
    $combo->save();

    //return redirect()->route('todos.index')->with('msgSuccess', "Registro incluído com sucesso!");

    return redirect()->route($formActions['index'])
      ->with('msgSuccess', "Registro incluído com sucesso!");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $formActions  = $this->getFormActions();
    $buttonHrefs  = $this->getButtonHrefs();

    $combo = $this->findCombo($id);
    if (is_null($combo)) {
      return redirect()->route('combos.index')->withErrors(['Registro não localizado!']);
    }

    return view('admin.combos.show')
      ->with([
        'formModel'    => $combo,
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
    $combo = $this->findCombo($id);

    if (is_null($combo)) {
      return redirect()->route($formActions['index'])
        ->withErrors(['Registro não localizado!']);
    }

    return view('admin.combos.edit')
      ->with([
        'formModel'    => $combo,
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
  public function update(ComboFormRequest $request, $id)
  {
    $formActions = $this->getFormActions();
    $input = \Request::all();
    extract($input);

    $combo = $this->findCombo($id);
    if (is_null($combo)) {
      return redirect()->route($formActions['index'])
        ->withErrors(['Registro não localizado!']);
    }

    $combo->name   = $name;
    $combo->value  = $value;
    $combo->option = $option;
    $combo->save();

    return redirect()->route($formActions['index'])
      ->with('msgSuccess', "Registro atualizado com sucesso!");
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

    $combo = $this->findCombo($id);
    if (is_null($combo)) {
      return redirect()->route('combos.index')
        ->withErrors(['Registro não localizado!']);
    }

    return view('admin.combos.delete')
      ->with([
        'formModel'    => $combo,
        'formActions'  => $formActions,
        'buttonHrefs'  => $buttonHrefs,
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $formActions = $this->getFormActions();

    $combo = $this->findCombo($id);

    if (is_null($combo)) {
      return redirect()->route($formActions['index'])
        ->withErrors(['Registro não localizado!']);
    }

    $result = $combo->delete();
    if (!$result) {
      return redirect()->route($formActions['index'])
        ->withErrors(['Falha ao excluir o registro!']);
    }

    return redirect()->route($formActions['index'])
      ->with('msgSuccess', "Registro excluído com sucesso!");
  }
}
