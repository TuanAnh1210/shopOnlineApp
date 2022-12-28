<?php
class BaseController
{
    const VIEW_FOLDER_NAME = 'app/Views';
    const MODEL_FOLDER_NAME = 'app/Models';

    protected function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }


        require(self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    protected function loadModel($modelPath)
    {
        require(self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');
    }
}