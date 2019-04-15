<?php

namespace App\Http\Controllers\Front;

use App\Model\Admin\Entity;
use App\Repository\Admin\ContentRepository;
use App\Repository\Admin\EntityRepository;

class HomeController extends BaseController
{
    public function index()
    {
        $entities = EntityRepository::all();
        return view('welcome', compact('entities'));
    }

    public function content($entityId)
    {
        $entity = Entity::query()->findOrFail($entityId);

        ContentRepository::setTable($entity->table_name);
        $contents = ContentRepository::paginate();

        return view('front.content.list', compact('entity', 'contents'));
    }
}