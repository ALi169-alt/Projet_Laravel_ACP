<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'CodeEtudiant'=>'required|max:10|min:10',
            'NomEtudiant'=>'required',
            'PrenomEtudiant'=>'required',
            'Ville'=>'required',
            'NbPhone'=>'required',
            'photo'=>'required',
            'CINEtudiant'=>'required',
            'Date'=>'required',
            'Password'=>'required',
            'AnneBac'=>'required',
            'Feliere'=>'required'

        ];
    }
}
