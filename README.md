# yii2-editor.md
Yii2 with editor.md Markdown

## Usage

```php
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use anruence\editormd\EditorMd;

?>

    <?= $form->field($model, 'content')->widget(EditorMd::className(), [
            'id' => 'test-editormd',
            'clientOptions' => [
                'name' => 'Blog[content]',
                'value' => $model ? $model->content : '',
                'height' => '640',
                'imageUpload' => true,
                'imageFormats' => ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                'imageUploadURL' => "./php/upload.php?test=dfdf",
            ]
        ]
    ) ?>
```
