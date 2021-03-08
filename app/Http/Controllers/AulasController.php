<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAula;
use App\Models\Aula;
use App\Models\User;
use App\Models\Aula_User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AulasController extends Controller
{

    public function listaAulasIndex()
    {
        $aulas = Aula::orderBy('viewCount', 'DESC')->paginate(3); //Configurar paginação se precisar/Ordem invertida

        return view('telas.index', compact('aulas'));
    }

    public function userAulasList()
    {
        $aulas = Aula::orderBy('created_at', 'DESC')->paginate();

        $historicos = Aula_User::latest('dateTime')->paginate(5);
        
        return view('telas.userArea', compact('aulas', 'historicos'));
    }

    public function searchList()
    {
        $aulas = Aula::orderBy('created_at', 'DESC')->paginate(9); //Configurar paginação se precisar/Ordem invertida

        return view('telas.buscaAula', compact('aulas'));
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

        $aula->viewCount++;
        $aula->save();

        $userCreator = User::where('id', $aula->userId)->first()->toArray();

        //Colocar aula no histórico do usuário
        if((Auth::id()!=null)){
            $user = auth()->user();
            $user->aulaAsHistoric()->attach($id);
            $historic = Aula::findOrFail($id);

        }
        
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

    public function clearHistoric()
    {
        $aula = Aula_User::where('user_id', Auth::id());
        $aula->delete();

        return redirect()
                ->route('aula.userList')
                ->with('message', 'Histórico deletado com sucesso.');
    }

    public function search(Request $request)
    {
        $filters = $request->all();

        $name = 0;

        $aulas = Aula::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->orWhere('grade', 'LIKE', "%{$request->search}%")
                        ->orWhere('discipline', 'LIKE', "%{$request->search}%")
                        ->orWhereHas('user', function($q) use($request){
                            $q->where('name', 'LIKE', "%{$request->search}%");
                        })->paginate(9);

        return view('telas.buscaAula', compact('aulas', 'filters'))
                ->with('message', 'Resultado da busca:');
    }
}
