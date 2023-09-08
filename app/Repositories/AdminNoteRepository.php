<?php

namespace App\Repositories;

use App\Interfaces\AdminNoteInterface;
use App\Models\AdminNote;
use App\Traits\RedirectNotification;

class AdminNoteRepository extends Repository implements AdminNoteInterface
{
    use RedirectNotification;

    public function __construct()
    {
        $this->model = new AdminNote();
        $this->fillable = $this->model->getFillable();
        $this->datatableSourceData = $this->model->latest()->with('user')->get();
        $this->datatableRoute = 'admin.adminnote';
        $this->datatableAction = ['SHOW'];
        $this->datatableHeader = [
            'Username' => 'username',
            'Fullname' => 'fullname',
            'Notes' => 'notes'
        ];
        $this->datatableColumns = [
            'username' => function ($data) {
                return $data->user->username;
            },
            'fullname' => function ($data) {
                return $data->user->first_name . " " . $data->user->last_name;
            }
        ];
        $this->datatableRawColumns = ['username', 'fullname'];
    }
}
