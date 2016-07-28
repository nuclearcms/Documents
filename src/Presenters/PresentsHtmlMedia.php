<?php


namespace Nuclear\Documents\Presenters;


trait PresentsHtmlMedia {

    /**
     * Presents audio html
     *
     * @param string $mediaType
     * @return string
     */
    public function presentHtmlMedia($mediaType)
    {
        $html = '<source src="' . $this->path . '" type="' . $this->mimetype . '">';

        foreach($this->entity->substitutes as $substitute)
        {
            $html .= '<source src="' . $substitute->path . '" type="' . $substitute->mimetype . '">';
        }

        return '<' . $mediaType . ' controls>' . $html . '</' . $mediaType . '>';
    }

}