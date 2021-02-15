<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaFormRequest;
use App\Model\Pais;
use App\Model\Pessoa;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    public function index(){
        $peoples = Pessoa::orderBy('pais_id', 'ASC')
            ->orderBy('genero', 'ASC')
            ->orderBy('nome', 'ASC')
            ->get();
        $states = Pais::all()->pluck('nome', 'id')->prepend('Selecione *', '');
        return view('pessoa', compact('peoples', 'states'));
    }

    public function store(PessoaFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $next_id = DB::select("select nextval('seq_pessoa')");
            $data['id'] = intval($next_id['0']->nextval);

            $created = Pessoa::create($data);
            DB::commit();

            $msgSuccess = 'Pessoa adicionada com sucesso, a página será atualiza em instantes.';

            return response()->json([
                'id' => $created->id,
                'message' => $msgSuccess,
                'people' => $created
            ], 200);

        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function update(PessoaFormRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            Pessoa::find($id)->update($data);

            DB::commit();
            $msgSuccess = 'Pessoa alterada com sucesso, a página será atualiza em instantes.';

            return response()->json([
                'id' => $id,
                'message' => $msgSuccess
            ], 200);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
            'message' => $e->getMessage()
            ], 400);
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try {
            $people = Pessoa::find($id);
            $people->delete();
            DB::commit();
            $msgSuccess = 'Pessoa removida com sucesso!';
            return response()->json([
                'message' => $msgSuccess
            ], 200);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function show($id){
        $people = Pessoa::find($id);
        $states = Pais::all()->pluck('nome', 'id')->prepend('Selecione *', '');
        return view('forms._form', compact('people', 'states'));
    }

    public function clear(){
        Pessoa::truncate();
    }

}
