<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 15/11/2017
 * Time: 03:41 PM
 */

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class OfficeEntityUser extends Model
{

    protected $guarded = [];

    public $userId;
    public $officeEntityId;

    public function getAttributesArray()
    {
        return [
            'user_id' => $this->userId,
            'office_entity_id' => $this->officeEntityId
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function office_entity()
    {
        return $this->belongsTo(OfficeEntity::class, 'office_entity_id');
    }
}