<?php

namespace App\Interfaces;

use App\Http\Requests\StoreAdminNoteRequest;
use App\Http\Requests\UpdateAdminNoteRequest;

interface AdminNoteInterface
{
	public function get(array $condition);
	public function getAll(array $condition = []);
	public function store(StoreAdminNoteRequest $request);
	public function update(UpdateAdminNoteRequest $request, array $condition);
	public function put(array $request, array $condition);
	public function destroy(array $condition);
	public function datatable($sourcedata = null);
	public function buildDatatableTable();
	public function buildDatatableScript();
}
