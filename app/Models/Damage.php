<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    //
    protected $primaryKey = "id_damage";
    protected $table = 'damages';
    public $timestamps = false;
    const CREATED_AT = 'damage_registration';
    const UPDATED_AT = 'damage_resolved';
    protected $fillable = ['id_user', 'id_solved_user', 'damage_type', 'damage_place', 'damage_description', 'damage_registration ', 'damage_resolved', 'status'];

    public function getAll()
    {
        return Damage::all();
    }
    public function getOne($id)
    {
        return Damage::where($this->primaryKey,$id)->first();
    }
    public function damageUsers()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function insertDamage()
    {
        $dateCreate=date('Y-m-d H:i:s');
        Damage::create(['id_user' => '2', 'damage_type' => 'kvar Sobe', 'damage_place' => 'Sijalica','damage_registration'=>$dateCreate , 'damage_description' => 'krevet je kvar', 'status' => 0]);
    }

    public function deleteDamage($id)
    {
        Damage::where($this->primaryKey, $id)->delete();
    }

    public function updateDamage()
    {
        $id = 1;
        $damage = Damage::where($this->primaryKey, $id)->first();
        $damage->id_solved_user = 21;
        $damage->status = 1;
        $damage->damage_resolved = date('Y-m-d H:i:s');
        //dd($damage);
        $damage->update();
    }
}
