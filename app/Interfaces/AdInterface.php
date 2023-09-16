<?php

namespace App\Interfaces;

use App\Http\Requests\StoreAdsRequest;
use App\Http\Requests\UpdateAdsRequest;

interface AdInterface
{
	public function get(array $condition);
	public function getAll(array $condition = []);
	public function store(StoreAdsRequest $request);
	public function update(UpdateAdsRequest $request, array $condition);
	public function put(array $request, array $condition);
	public function destroy(array $condition);
	public function datatable($sourcedata = null);
	public function buildDatatableTable();
	public function buildDatatableScript();
}
