<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StoreUpdateAula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:160', 
            'discipline' =>'required|min:3|max:160',
            'content' => 'required|min:50|max:65000',
            'image'=> ['required', 'image'], //Posso colocar uma validação pra limitar o tamanho da imagem
            'aulaVideo'=> 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'imageFont'=> ['nullable', 'min:3', 'max:160'],
            'references'=> ['nullable', 'min:3', 'max:65000']
        
        ];
    }
}
