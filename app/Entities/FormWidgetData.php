<?php

namespace App\Entities;

class FormWidgetData
{
    /**
     * @var string
     */
    public string $pageUid;

    /**
     * @var string
     */
    public ?string $userName;

    /**
     * @var string
     */
    public ?string $message;

    public function __construct(string $pageUid, ?string $userName = null, ?string $message = null)
    {
        $this->pageUid = $pageUid;
        $this->userName = $userName;
        $this->message = $message;
    }
}
