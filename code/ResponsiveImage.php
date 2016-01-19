<?php

class ResponsiveImage extends Image
{

    private static $db = array(
        "SmallWidth" => "Int",
        "MediumWidth" => "Int"
    );

    public function generateSmallSizeImage(GD $gd)
    {
        return $gd->resizeByWidth($this->SmallWidth);
    }

    public function generateMediumSizeImage(GD $gd)
    {
        return $gd->resizeByWidth($this->MediumWidth);
    }

    public function Responsive()
    {
        $x = $this->getWidth();
        $y = $this->getHeight();
        if (!$x || !$y) {
            return '<img src="'.$this->URL.'" alt="'.$this->Title.'" />';
        }
        $ratio = $this->getWidth() / $this->getHeight();
        $pad = $ratio * 100;
        return "<div class='r-image' style='padding-bottom:".$pad."%;'><noscript data-ratio='".$ratio."'
				data-alt='".$this->Title."'
				data-src-small='".$this->SmallSizeImage()->URL."'
				data-src-medium='".$this->MediumSizeImage()->URL."'
				data-src-large='".$this->URL."'><img src='".$this->URL."' /></noscript></div>";
    }

    public function getCustomFields()
    {
        $fields = new FieldList();
        $fields->push(new TextField('SmallWidth', 'Small Width'));
        $fields->push(new TextField('MediumWidth', 'Medium Width'));
        return $fields;
    }
}
