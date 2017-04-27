<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComboFormRequest;

use App\Combo;

class ComboController extends Controller
{

  private function getActions()
  {
    $actions['panelButton']['home']         = 'home';
    $actions['panelButton']['voltarIndex']  = 'combos.index';
    $actions['panelButton']['incluir']      = 'combos.create';
    $actions['panelButton']['editar']       = 'combos.edit';
    $actions['formButton']['cancelarIndex'] = 'combos.index';
    $actions['formButton']['cancelarShow']  = 'combos.show';
    $actions['tableButton']['exibir']       = 'combos.show';
    $actions['tableButton']['excluir']      = 'combos.delete';

    $actions['formAction']['edit']        = 'disabled';
    $actions['formAction']['index']       = 'combos.index';
    $actions['formAction']['store']       = 'combos.store';
    $actions['formAction']['update']      = 'combos.update';
    $actions['formAction']['destroy']     = 'combos.destroy';

    return $actions;
  }

  private function getOptions()
  {
    $options['formOption']['edit'] = 'disabled';

    return $options;
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

    return view('admin.combos.index')
      ->with([
        'listModels' => $combos,
        'actions'    => $this->getActions(),
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $options = $this->getOptions();
    $options['formOption']['edit'] = null;

    $combo = new \App\Combo();

    return view('admin.combos.create')
      ->with([
        'formModel' => $combo,
        'actions'   => $this->getActions(),
        'options'   => $options,
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ComboFormRequest $request)
  {
    $actions = $this->getActions();
    $input = \Request::except('_token');
    extract($input);

    $combo = new \App\Combo();
    $combo->name = $name;
    $combo->option = $option;
    $combo->value = $value;
    $combo->save();

    return redirect()->route($actions['formAction']['index'])
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
    $combo = $this->findCombo($id);
    if (is_null($combo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors(['Registro não localizado!']);
    }

    return view('admin.combos.show')
      ->with([
        'formModel' => $combo,
        'actions'   => $this->getActions(),
        'options'   => $this->getOptions(),
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
    $options = $this->getOptions();
    $options['formOption']['edit'] = null;

    $combo = $this->findCombo($id);

    if (is_null($combo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors(['Registro não localizado!']);
    }

    return view('admin.combos.edit')
      ->with([
        'formModel' => $combo,
        'actions'   => $this->getActions(),
        'options'   => $options,
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
    $actions = $this->getActions();
    $input = \Request::all();
    extract($input);

    $combo = $this->findCombo($id);
    if (is_null($combo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors(['Registro não localizado!']);
    }

    $combo->name   = $name;
    $combo->value  = $value;
    $combo->option = $option;
    $combo->save();

    return redirect()->route($actions['formAction']['index'])
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
    $combo = $this->findCombo($id);
    if (is_null($combo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors(['Registro não localizado!']);
    }

    return view('admin.combos.delete')
      ->with([
        'formModel' => $combo,
        'actions'   => $this->getActions(),
        'options'   => $this->getOptions(),
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
    $actions = $this->getActions();

    $combo = $this->findCombo($id);

    if (is_null($combo)) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors(['Registro não localizado!']);
    }

    $result = $combo->delete();
    if (!$result) {
      return redirect()->route($actions['formAction']['index'])
        ->withErrors(['Falha ao excluir o registro!']);
    }

    return redirect()->route($actions['formAction']['index'])
      ->with('msgSuccess', "Registro excluído com sucesso!");
  }
}
