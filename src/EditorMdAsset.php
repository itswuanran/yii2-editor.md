<?php

namespace anruence\EditorMdAssert;
use yii\web\AssetBundle;

class EditorMdAssert extends AssetBundle
{
    public $sourcePath = '@bower/editor.md';
    public function init()
    {
        $this->js = YII_DEBUG ? ['editormd.js.js'] : ['editormd.js.min.js'];
    }
}