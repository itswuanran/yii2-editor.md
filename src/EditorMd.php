<?php

namespace anruence\editormd;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\jui\InputWidget;

class EditorMd extends InputWidget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     */
    public $options = [];

    /**
     * editor options
     */
    public $clientOptions = [];

    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::tag('div', '', $this->options);
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        $editormd = EditorMdAsset::register($view);
        $this->clientOptions['path'] = $editormd->baseUrl . '/lib/';
        $options = Json::encode($this->clientOptions);
        $js = 'var editor = editormd("' . $id . '", ' . $options . ');';
        $view->registerJs($js);
    }
}