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
        $html = '<source src="' . $this->entity->getPublicURL() . '" type="' . $this->mimetype . '">';

        foreach($this->entity->substitutes as $substitute)
        {
            $html .= '<source src="' . uploaded_asset($substitute->path) . '" type="' . $substitute->mimetype . '">';
        }

        return '<' . $mediaType . ' controls>' . $html . '</' . $mediaType . '>';
    }

}