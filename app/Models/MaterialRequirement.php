<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 06-Jun-19
 * Time: 6:00 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequirement extends Model
{
    protected $table = 'material_requirement';
    protected $primaryKey = 'id_requirement';
    protected $fillable = ['id_user','requiremnt_name','requirement_quantity'];

    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    public function getAll()
    {
        return MaterialRequirement::all();
    }
    public function getOne($id)
    {
        return MaterialRequirement::where($this->primaryKey, $id)->first();
    }
    public function deleteRequirement($id)
    {
        $isExists = MaterialRequirement::where($this->primaryKey,$id)->get();
        if($isExists->isNotEmpty())
        {
            MaterialRequirement::where($this->primaryKey,$id)->delete();
        }else
            {
                echo "Nema id, ne moze da se brise!";
            }
        //MaterialRequirement::where($this->primaryKey,$id)->delete();
    }
    public function insertMaterialRequirement()
    {
        $user = 1;
        $name = 'Ekser';
        $qunatity = 5;
        MaterialRequirement::create(['id_user'=>$user,'requiremnt_name'=>$name,'requirement_quantity'=>$qunatity]);
        echo 'Uneo sam zahtev';
    }
    //dohvati za odredjenog usera sve zahteve
    public function getUserRequirement()
    {
        $id = 1;
        $requirement = MaterialRequirement::where('id_user',$id)->get();
        return $requirement;
    }
}