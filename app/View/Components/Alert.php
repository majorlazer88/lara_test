<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $alertType;
    public $camelCase;
    public $selected = true;
    public $value;

    // dependencies can be passed as first parameters to constructor Ex: AlertCreator $creator
    public function __construct($type, $message, $camelCase, $alertType, $value)
    {
        $this->type = $type;
        $this->message = $message;
        $this->camelCase = $camelCase;
        $this->alertType = $alertType;
        $this->value = $value;
    }

        /**
     * The properties / methods that should not be exposed to the component template.
     *
     * @var array
     */
    protected $except = ['someAttribute'];

    public function isSelected($boolean)
    {
        return $boolean === $this->selected;
    }

    public function formatAlert(string $string): string
    {
        return $string . ' appended text... MAGIC';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->alertType);
        return view('components.alert');

        // return function (array $data) {
        //     // $data['componentName'];
        //     // $data['attributes'];
        //     // $data['slot'];

        //     return '<div>Components content</div>';
        // };
    }
}
