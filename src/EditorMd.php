<?php

namespace anruence\editormd;

use yii\base\Widget;
use yii\helpers\Html;

class EditorMd extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     */
    public $options = [];

    public $data = [];

    public $type;

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

    /**
     * Registers the required js files and script to initialize ChartJS plugin
     */
    protected function registerClientScript()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        EditorMdAssert::register($view);
        $js = ';var editor = editormd("' . $id . '", {
            path : "../lib/"  
        });';
        $view->registerJs($js);
    }
}