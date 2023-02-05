<?php

namespace App\Http\Controllers;

use App\Http\Resources\TreningResurs;
use App\Models\Trening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreningController extends HandleController
{
    public function index()
    {
        $treninzi = Trening::all();
        return $this->success(TreningResurs::collection($treninzi), 'Vraceni svi podaci o treninzima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'duzina' => 'required',
            'tipId' => 'required',
            'tezina' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $trening = Trening::create($input);

        return $this->success(new TreningResurs($trening), 'Nov trening je kreiran.');
    }


    public function show($id)
    {
        $trening = Trening::find($id);
        if (is_null($trening)) {
            return $this->error('Trening sa zadatim id-em ne postoji.');
        }
        return $this->success(new TreningResurs($trening), 'Trening sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $trening = Trening::find($id);
        if (is_null($trening)) {
            return $this->error('Trening sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'duzina' => 'required',
            'tipId' => 'required',
            'tezina' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $trening->naziv = $input['naziv'];
        $trening->duzina = $input['duzina'];
        $trening->tipId = $input['tipId'];
        $trening->tezina = $input['tezina'];
        $trening->save();

        return $this->success(new TreningResurs($trening), 'Trening je azuriran.');
    }

    public function destroy($id)
    {
        $trening = Trening::find($id);
        if (is_null($trening)) {
            return $this->error('Trening sa zadatim id-em ne postoji.');
        }

        $trening->delete();
        return $this->success([], 'Trening je obrisan.');
    }
}
