<?php

namespace App\Repositories;

use App\Interfaces\UserBotInterface;
use App\Models\UserBot;
use App\Traits\RedirectNotification;

class UserBotRepository extends Repository implements UserBotInterface
{
    use RedirectNotification;

    public function __construct()
    {
        $this->model = new UserBot();
        $this->fillable = $this->model->getFillable();
        $this->datatableSourceData = $this->model->latest()->get();
        $this->datatableRoute = 'admin.userbot';
        $this->datatableAction = ['SHOW'];
        $this->datatableHeader = [
            'User ID' => 'id',
            'Username' => 'username',
            'Fullname' => 'fullname',
        ];
        $this->datatableColumns = [
            'fullname' => function ($data) {
                return "$data->first_name $data->last_name";
            }
        ];
    }
}
