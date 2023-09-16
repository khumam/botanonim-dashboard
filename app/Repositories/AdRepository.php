<?php

namespace App\Repositories;

use App\Interfaces\AdInterface;
use App\Models\Ads;
use App\Traits\RedirectNotification;

class AdRepository extends Repository implements AdInterface
{
    use RedirectNotification;

    public function __construct()
    {
        $this->model = new Ads();
        $this->fillable = $this->model->getFillable();
        $this->datatableSourceData = $this->model->latest()->get();
        $this->datatableRoute = 'admin.ads';
        $this->datatableHeader = [
            'Customer' => 'customer',
            'Contact' => 'customer_contact',
            'Start' => 'start_at',
            'End' => 'end_at'
        ];
    }

    public function store($request)
    {
        $request->metadata = json_encode([[
            'text' => $request->cta_text,
            'url' => $request->cta_link
        ]]);
        $request->image = $this->uploadFile($request, 'image', 'public/media');
        return $this->model::create($this->build($request));
    }

    public function update($request, array $condition)
    {
        if ($request->hasFile('image')) {
            $request->image = $this->uploadFile($request, 'image', 'public/media', true);
        } else {
            $asset = $this->get($condition);
            $request->image = $asset->image;
        }
        $request->metadata = json_encode([[
            'text' => $request->cta_text,
            'url' => $request->cta_link
        ]]);
        return $this->model::where($condition)->update($this->build($request, true));
    }
}
