<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, svg', 'maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageFiles' => 'Вложение',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function uploadSliderImages($qr_id)
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                if (!file_exists('images/qr-sliders/qr-' . $qr_id)) {
                    mkdir('images/qr-sliders/qr-' . $qr_id, 0777, true);
//                    $file->saveAs("images/qr-sliders/qr-" . $qr_id . "/slide-" . $file->baseName . ".{$file->extension}");
                }
                $file->saveAs("images/qr-sliders/qr-" . $qr_id . "/slide-" . $file->baseName . ".{$file->extension}");

                $model = new QrSlider();
                $model->qr_id = $qr_id;
                $model->file_name = 'slide-' . $file->baseName . '.' . $file->extension;
                $model->save();
            }
            return true;
        } else {
            return false;
        }
    }
}