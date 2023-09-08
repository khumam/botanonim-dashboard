<?php

namespace App\Interfaces;

use App\Http\Requests\StoreBannedRequest;
use App\Http\Requests\UpdateBannedRequest;

interface BannedInterface
{
	public function get(array $condition);
	public function getAll(array $condition = []);
	public function store(StoreBannedRequest $request);
	public function update(UpdateBannedRequest $request, array $condition);
	public function put(array $request, array $condition);
	public function destroy(array $condition);
	public function datatable($sourcedata = null);
	public function buildDatatableTable();
	public function buildDatatableScript();
}
