<?php

namespace App\Http\Controllers;

use App\Entities\FormWidgetData;
use App\Services\FormWidgetService;
use AvtoDev\JsonRpc\Requests\RequestInterface;
use Illuminate\Support\Facades\Validator;

class JsonRpcController extends Controller
{
    private FormWidgetService $formWidgetService;

    public function __construct(FormWidgetService $formWidgetService)
    {
        $this->formWidgetService = $formWidgetService;
    }

    public function addFormData(RequestInterface $request)
    {
        try
        {
            $params = $request->getParams();

            $collection = collect($params)->toArray();

            $validator = Validator::make($collection, [
                'userName' => 'required|string',
                'message' => 'required|string',
                'pageUid' => 'required|string'
            ]);

            $validator->validate();

            $formWidgetData = new FormWidgetData($params->pageUid, $params->userName, $params->message);

            $this->formWidgetService->addFormData($formWidgetData);

            return [
                'status' => 'Success'
            ];
        }
        catch (\Exception $exception)
        {
            $response = [
                'jsonrpc' => '2.0',
                'error'   => [
                    'code'    => $exception->getCode(),
                    'message' => $exception->getMessage(),
                ],
                'id'      => $request->getId(),
            ];

            echo \response()->json($response)->getContent();
        }
    }

    public function getFormDataByPageUid(RequestInterface $request)
    {
        try
        {
            $params = $request->getParams();

            $collection = collect($params)->toArray();

            $validator = Validator::make($collection, [
                'pageUid' => 'required|string'
            ]);

            $validator->validate();

            $formData = $this->formWidgetService->getFormDataByPageUid($params->pageUid);

            return $formData;
        }
        catch (\Exception $exception)
        {
            $response = [
                'jsonrpc' => '2.0',
                'error'   => [
                    'message' => $exception->getMessage(),
                    'code'    => $exception->getCode(),
                ],
                'id'      => $request->getId(),
            ];

            echo \response()->json($response)->getContent();
        }
    }
}
