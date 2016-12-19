<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class Rest_api_v1
{


    public function index()//
    {
        //GET /goods
        return Capsule::table('goods')->get();
    }

    public function show($id)//
    {
        //GET /goods/1
        return Capsule::table('goods')->where('id', $id)->get();
    }

    public function edit($id, $NewName)//
    {
        //PUT /goods/1,solders
        $NewName = urldecode($NewName);
        Capsule::table('goods')->where('id', $id)->update(['name' => $NewName]);
    }

    public function store($name, $category, $amount)//add
    {
        $arrArg = func_get_args();

        for ($i = 0; $i < count($arrArg); $i++) {
            $arrArg[$i] = urldecode($arrArg[$i]);
        }
        //POST /goods
        Capsule::table('goods')->insert(['name' => $arrArg[0], 'category' => $arrArg[1], 'amount' => $arrArg[2]]);

    }

    public function destroy($id)
    {
        //DELETE /goods/1
        Capsule::table('goods')->where('id', $id)->delete();
    }


}