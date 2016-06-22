<?php

/**
 * Class ImageToCss
 * @Author  Tayfun Erbilen
 * @Web     http://erbilen.net
 * @Email   tayfunerbilen@gmail.com
 */
class ImageToCss
{

    public $shadow = [];

    public function __construct($image, $elem)
    {
        $this->image = imagecreatefrompng($image);
        $size = getimagesize($image);
        $this->x = $size[0];
        $this->y = $size[1];
        $this->elem = $elem;
    }

    public function draw()
    {
        for ($i = 0; $i < $this->x; $i++) {
            for ($e = 0; $e < $this->y; $e++) {
                $rgb = imagecolorat($this->image, $i, $e);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                $this->shadow[] = $i . 'px ' . $e . 'px 0 1px rgb(' . $r . ',' . $g . ',' . $b . ')';
            }
        }
        return '<style>
            ' . $this->elem . ' {
                width: ' . $this->x .  'px;
                height: ' . $this->y . 'px;
            }
            ' . $this->elem . ':before {
                content: "";
                box-shadow: ' . implode(',', $this->shadow) . ';
                position: absolute;
                top: 0;
                left: 0;
            }
        </style>';
    }

}
