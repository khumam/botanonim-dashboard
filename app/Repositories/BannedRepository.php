<?php

namespace App\Repositories;

use App\Interfaces\BannedInterface;
use App\Models\Banned;
use App\Traits\RedirectNotification;

class BannedRepository extends Repository implements BannedInterface
{
    use RedirectNotification;

    public function __construct()
    {
        $this->model = new Banned();
        $this->fillable = $this->model->getFillable();
        $this->datatableSourceData = $this->model->latest()->with('user')->get();
        $this->datatableRoute = 'admin.banned';
        $this->datatableAction = ['SHOW'];
        $this->datatableHeader = [
            'Username' => 'username',
            'Fullname' => 'fullname',
            'User ID' => 'user_id',
            'Reason' => 'reason'
        ];
        $this->datatableColumns = [
            'username' => function ($data) {
                return $data->user->username;
            },
            'fullname' => function ($data) {
                return "$data->user->first_name $data->user->last_name";
            }
        ];
        $this->datatableRawColumns = ['username', 'fullname'];
    }
}
