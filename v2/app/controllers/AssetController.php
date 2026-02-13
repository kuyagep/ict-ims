<?php

require_once __DIR__ . '/../models/Asset.php';

class AssetController
{

    public function index()
    {

        $asset = new Asset();
        $assets = $asset->getAll();

        include __DIR__ . '/../../resources/views/assets/index.php';
    }
}
