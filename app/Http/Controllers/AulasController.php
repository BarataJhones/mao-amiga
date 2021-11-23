<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAula;
use App\Http\Requests\StoreUpdateFile;
use App\Models\Aula;
use App\Models\User;
use App\Models\File;
use App\Models\Comment;
use App\Models\Aula_User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class AulasController extends Controller
{

    public function listaAulasIndex()
    {

        $aulas = Aula::get();
        if ((!$aulas->isEmpty())) {

            $aulas = Aula::orderBy('viewCount', 'DESC')->paginate(3); //Configurar paginação se precisar/Ordem invertida
            $replies = Comment::get();
        } else {
            $aulas = null;
            $replies = null;
        }

        return view('telas.index', compact('aulas', 'replies'));
    }

    public function userAulasList()
    {

        $user = auth()->user();

        $aulas = Aula::where('userId', $user->id)->latest('created_at')->paginate(10);
        
        $historicos = Aula_User::where('user_id', $user->id)->latest('dateTime')->paginate(10);
        
        return view('telas.userArea', compact('aulas', 'historicos', 'user'));
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

    public function store(StoreUpdateAula $request, StoreUpdateFile $request_file)
    {

        $data = $request->all();

        //Pegar id do usuário
        $user = auth()->user();
        $data['userId'] = $user->id;


        //Imagem
        if ($request->image->isValid()) {

            $image = $request->image->store(path: 'aulasData.image', options:'s3');
            $data['image'] = $image;
        }

        //Vídeo
        if ($request->aulaVideo->isValid()) {

            $this->validate($request, [
                'aulaVideo' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            ]);

            $video = $request->aulaVideo->store(path: 'aulasData.video', options:'s3');
            $data['aulaVideo'] = $video;
        }

        $aula_id = Aula::create($data); //Model Aula

        //Upload dos arquivos
        $request_file->validate([
            'file' => 'nullable',
        ]);

        if ($request_file->hasfile('file')) {

            $files = $request_file->file('file');

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();

                $filePath = $file->store(path: 'aulasData.files', options:'s3');

                File::create([
                    'title' => $fileName,
                    'filePath' => $filePath,
                    'aula_id' => $aula_id->id
                ]);
            }
        }

        return redirect()
            ->route('aula.userList')
            ->with('message', 'Aula criada com sucesso');
    }

    public function viewAula($id, Request $request)
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
            Aula::findOrFail($id);
            //Aula_User::whereDate('dateTime',  Carbon::today()->toDateString())->get();

        }

        $files = File::where('aula_id',  $aula->id)->get();

        $comments = Comment::where('aula_id',  $aula->id)
                            ->orderBy('created_at', 'DESC')->paginate(10);

        $replies = Comment::where('aula_id',  $aula->id)
                            ->orderBy('created_at')->get();
        
        return view('telas.aula', compact('aula', 'userCreator', 'files', 'comments', 'replies'));
    }

    public function destroy($id)
    {
        if (!$aula = Aula::find($id))
            return redirect()->back();

        if (Storage::disk('s3')->exists($aula->image))
            Storage::disk('s3')->delete($aula->image);

        if (Storage::disk('s3')->exists($aula->aulaVideo))
            Storage::disk('s3')->delete($aula->aulaVideo);

        $files = File::where('aula_id',  $aula->id)->get();

        foreach ($files as $file) {
            Storage::disk('s3')->delete([$file->filePath]);
        }

        $aula->delete();

        return redirect()
            ->back()
            ->with('message', 'Aula deletada com sucesso.');
    }
    
    public function edit($id)
    {

        $user = auth()->user();

        //dd($user->id);

        if (!$aula = Aula::find($id)) {
            return redirect()->back();
        }

        if ($user->id != $aula->userId) {
            return redirect()->back();
        }

        return view('telas.edit-aula', compact('aula'));
    }

    public function update(StoreUpdateAula $request, $id, StoreUpdateFile $request_file)
    {

        if (!$aula = Aula::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->image->isValid()) {
            if (Storage::disk('s3')->exists($aula->image))
                Storage::disk('s3')->delete($aula->image);


            $image = $request->image->store(path: 'aulasData.image', options:'s3');
            $data['image'] = $image;
        }

        if ($request->aulaVideo->isValid()) {
            if (Storage::disk('s3')->exists($aula->aulaVideo))
                Storage::disk('s3')->delete($aula->aulaVideo);


            $video = $request->aulaVideo->tore(path: 'aulasData.video', options:'s3');
            $data['aulaVideo'] = $video;
        }

        //Upload dos arquivos
        $request_file->validate([
            'file' => 'nullable',
        ]);

        $aula_id = $id;

        $filesDel = File::where('aula_id',  $id)->get();

        foreach ($filesDel as $file) {
            Storage::disk('s3')->delete([$file->filePath]);
        }

        File::where('aula_id',  $id)->delete();

        if ($request_file->hasfile('file')) {

            $files = $request_file->file('file');

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();

                $filePath = $file->store(path: 'aulasData.files', options:'s3');

                File::create([
                    'title' => $fileName,
                    'filePath' => $filePath,
                    'aula_id' => $aula_id
                ]);
            }
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

    public function fileDownload($id)
    {

        $dl = File::find($id);
        return Storage::disk('s3')->download($dl->filePath, $dl->title);
    }
}
