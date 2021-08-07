<?php

namespace app\models;

use Carbon\Carbon;
use Yii;
use yii\web\UploadedFile;

class UploadFiles
{
    public function getUploadVoiceMessage($model, $field, $current_audio = null)
    {
        $nowDate = Carbon::now()->format('Y-m-d-H-i-s');

        if (!empty($current_audio)) {                   // не удаляет старый файл 07.08.2021
            $this->deleteCurrentFile($current_audio);
        }

        $model->$field = UploadedFile::getInstance($model, '' . $field);

        return $this->saveFile($model, $field, $nowDate);
    }

    private function getQrVoiceMessagesFolder()
    {
        return Yii::getAlias("@web")  . "audio/qr-voice-messages/";
    }

    private function generateFileName($model,$field,$nowDate)
    {
        $file_name = "qr-audio-message-" . $nowDate . ".{$model->$field->extension}";

        return $file_name;
    }

    public function deleteCurrentFile($current_file)
    {
        if ($this->fileExists($current_file)) {
            \unlink($this->getQrVoiceMessagesFolder() . $current_file);
        }
    }

    public function fileExists($current_file)
    {
        if (!empty($current_file) && null != $current_file) {
            return file_exists($this->getQrVoiceMessagesFolder() . $current_file);
        }

        return false;
    }

    public function saveFile($model, $field, $nowDate)
    {
        $file_name = $this->generateFileName($model, $field, $nowDate);
        $model->$field->saveAs($this->getQrVoiceMessagesFolder() . $file_name);
        $model->$field = $file_name;
        return $model->$field;
    }
}