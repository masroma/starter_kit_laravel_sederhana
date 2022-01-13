<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class GroupPermissionModel extends Model
{
    use HasFactory;
    protected $table = "group_permissions";

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'id');
    }
}
