<?php

namespace App\Interfaces;

use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;

interface RequestInterface
{
	public function get(array $condition);
	public function getAll(array $condition = []);
	public function datatable($sourcedata = null);
	public function buildDatatableTable();
	public function buildDatatableScript();
    public function approve($userId);
}
