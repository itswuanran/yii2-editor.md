<?php

namespace anruence\editormd;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

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
        if ($this->hasModel()) {
            $this->name = empty($this->options['name']) ? Html::getInputName($this->model, $this->attribute) :
                $this->options['name'];
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
        }
        echo Html::tag('div', '', $this->options);
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        $editormd = EditorMdAsset::register($view);
        $id = $this->options['id'];
        $this->options['value'] = $this->value;
        $this->options['name'] = $this->name;
        $this->options['path'] = $editormd->baseUrl . '/lib/';
        $options = Json::encode($this->options);
        $js = 'var editor = editormd("' . $id . '", ' . $options . ');';
        $view->registerJs($js);
    }
}