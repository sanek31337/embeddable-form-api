<?php

namespace App\Services;

use App\Entities\FormWidgetData;
use App\Exceptions\JsonRpcException;
use App\Models\FormWidget;

class FormWidgetService
{
    /**
     * @param FormWidgetData $widgetData
     * @throws JsonRpcException
     */
    public function addFormData(FormWidgetData $widgetData)
    {
        $formWidget = new FormWidget();

        $formWidget->pageUid = $widgetData->pageUid;
        $formWidget->userName = $widgetData->userName;
        $formWidget->message = $widgetData->message;
        $formWidget->created = now();

        if (!$formWidget->save())
        {
            throw new JsonRpcException("Could not save form widget data into database");
        }
    }

    public function getFormDataByPageUid(string $pageUid)
    {
        return FormWidget::query()->where('pageUid', '=', $pageUid)->orderBy('created', 'DESC')->first()->toArray();
    }
}
