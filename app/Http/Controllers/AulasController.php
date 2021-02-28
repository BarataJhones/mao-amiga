<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAula;
use App\Models\Aula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AulasController extends Controller
{

    public function listaAulasIndex()
    {
        $aulas = Aula::latest('id')->paginate(3); //Configurar paginação se precisar/Ordem invertida

        return view('telas.index', compact('aulas'));
    }

    public function userAulasList()
    {
        $aulas = Aula::paginate();

        return view('telas.userArea', compact('aulas'));
    }

    public function cadastraAula()
    {

        return view('telas.cadastro-aulas');
    }

    public function store(StoreUpdateAula $request)
    {

        $data = $request->all();
        
        //Pegar id do usuário
        $user = auth()->user();
        $data ['userId'] = $user->id;

        //dd($data ['userId']);

        //Jogando os arquivos em suas respectivas pastas//
        if($request->image->isValid()){

            $image = $request->image->store('aulasData.image');
            $data ['image'] = $image;

        }

        if($request->aulaVideo->isValid()){

            $this->validate($request, [
                'aulaVideo' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            ]);

            
            $video = $request->aulaVideo->store('aulasData.video');
            $data ['aulaVideo'] = $video;

        }

        if($request->aulaFiles !=null ){
            
            $nameFile = 'User'. '.'. $data ['userId']. '.Aula.'. $request['title']. '.' .$request->aulaFiles->getClientOriginalName(). '.' .$request->aulaFiles->getClientOriginalExtension();
            
            $files = $request->aulaFiles->storeAs('aulasData.files', $nameFile);
            $data ['aulaFiles'] = $files;

        }

        Aula::create($data); //Model Aula

        return redirect()
        ->route('aula.userList')
        ->with('message', 'Aula criada com sucesso');

    }

    public function viewAula($id)
    {

        if (!$aula = Aula::find($id)){
            return redirect()->route('aula.listaIndex');
        }

        $userCreator = User::where('id', $aula->userId)->first()->toArray();

        return view('telas.aula', compact('aula', 'userCreator'));
    }

    public function destroy($id)
    {
        if (!$aula = Aula::find($id))
            return redirect()->back();

            if (Storage::exists($aula->image)) 
                Storage::delete($aula->image);

            if (Storage::exists($aula->aulaVideo)) 
                Storage::delete($aula->aulaVideo);

            if (Storage::exists($aula->aulaFiles)) 
                Storage::delete($aula->aulaFiles);

        $aula->delete();

        return redirect()
                ->back()
                ->with('message', 'Aula deletada com sucesso.');
    }
    
    public function edit($id)
    {

        if (!$aula = Aula::find($id)){
            return redirect()->back();
        }

        return view('telas.edit-aula', compact('aula'));
    }

    public function update(StoreUpdateAula $request, $id)
    {

        if (!$aula = Aula::find($id)){
            return redirect()->back();
        }

        $data = $request->all();

        if($request->image->isValid()){
            if (Storage::exists($aula->image)) 
                Storage::delete($aula->image);
            

            $image = $request->image->store('aulas');
            $data ['image'] = $image;

        }

        if($request->aulaVideo->isValid()){
            if (Storage::exists($aula->aulaVideo)) 
                Storage::delete($aula->aulaVideo);
            

            $video = $request->aulaVideo->store('aulas');
            $data ['aulaVideo'] = $video;

        }

        $aula->update($data);

        return redirect()
                ->route('aula.viewAula', $aula->id)
                ->with('message', 'Aula editada com sucesso.');
    }
}
