<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class AlertMessageCell extends Cell
{
    public $icon = 'check';
    public $status = 'success';
    public $message;
}
