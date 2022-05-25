<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface Service
{
    public function index();

    public function store($data);

    public function update($data, $entity);

    public function destroy($entity);
}