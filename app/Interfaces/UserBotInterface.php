<?php

namespace App\Interfaces;

use App\Http\Requests\StoreUserBotRequest;
use App\Http\Requests\UpdateUserBotRequest;

interface UserBotInterface
{
	public function get(array $condition);
	public function getAll(array $condition = []);
	public function datatable($sourcedata = null);
	public function buildDatatableTable();
	public function buildDatatableScript();
}
