<?php

namespace App\Interfaces;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

interface ReportInterface
{
	public function get(array $condition);
	public function getAll(array $condition = []);
	public function store(StoreReportRequest $request);
	public function update(UpdateReportRequest $request, array $condition);
	public function put(array $request, array $condition);
	public function destroy(array $condition);
	public function datatable($sourcedata = null);
	public function buildDatatableTable();
	public function buildDatatableScript();
    public function banned($reportId);
}
