<?php /** @noinspection PhpUnused */


namespace OpenGraph\Media;


use OpenGraph\Media\VisualMedia as OpenGraphProtocolVisualMedia;

/**
 * An image representing page content. Suitable for display alongside a summary of the webpage.
 */
class Image extends OpenGraphProtocolVisualMedia {

    /**
     * Map a file extension to a registered Internet media type
     *
     * @link http://www.iana.org/assignments/media-types/image/index.html IANA image types
     * @param string $extension file extension
     * @return string|void Internet media type in the format image/*
     */
    public static function extension_to_media_type( $extension ) {
        if ( empty($extension) || ! is_string($extension) )
            return;
        if ( $extension === 'jpeg' || $extension === 'jpg' )
            return 'image/jpeg';
        else if ( $extension === 'png' )
            return 'image/png';
        else if ( $extension === 'gif' )
            return 'image/gif';
        else if ( $extension === 'svg' )
            return 'image/svg+sml';
        else if ( $extension === 'ico' )
            return 'image/vnd.microsoft.icon';
    }

    /**
     * Set the Internet media type. Allow only image types.
     *
     * @param string $type Internet media type
     * @return Image
     */
    public function setType( $type ) {
        if ( substr_compare( $type, 'image/', 0, 6 ) === 0 )
            $this->type = $type;
        return $this;
    }
}