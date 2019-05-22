<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    //
    protected $primaryKey = "id_damage";
    protected $table = 'damages';
    const CREATED_AT = 'damage_registration';
    const UPDATED_AT = 'damage_resolved';
    protected $fillable = ['id_user', 'id_solved_user', 'damage_type', 'damage_place', 'damage_description', 'damage_registration ', 'damage_resolved', 'status'];

    public function damageUsers()
    {
        return $this->hasMany('App\Models\User', 'id_user');
    }

    public function insertDamage()
    {
        Damage::create(['id_user' => '1', 'damage_type' => 'kvar 1', 'damage_place' => 'soba', 'damage_description' => 'krevet je kvar', 'status' => 0]);
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
        $damage->update();
    }
}
