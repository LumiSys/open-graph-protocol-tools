<?php /** @noinspection PhpUnused */


namespace OpenGraph\Media;


use OpenGraph\Media as OpenGraphProtocolMedia;

abstract class VisualMedia extends OpenGraphProtocolMedia {
    /**
     * Height of the media object in pixels
     *
     * @var int
     * @since 1.3
     */
    protected $height;

    /**
     * Width of the media object in pixels
     *
     * @var int
     * @since 1.3
     */
    protected $width;

    /**
     * @return int width in pixels
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * Set the object width
     *
     * @param int $width width in pixels
     * @return VisualMedia
     */
    public function setWidth( $width ) {
        if ( is_int($width) && $width >  0 )
            $this->width = $width;
        return $this;
    }

    /**
     * @return int height in pixels
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Set the height of the referenced object in pixels
     * @return VisualMedia
     * @var int height of the referenced object in pixels
     */
    public function setHeight( $height ) {
        if ( is_int($height) && $height > 0 )
            $this->height = $height;
        return $this;
    }
}