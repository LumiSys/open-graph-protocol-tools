<?php /** @noinspection PhpUnused */


namespace OpenGraph\Media;


use OpenGraph\Media\VisualMedia as OpenGraphProtocolVisualMedia;

/**
 * A video that complements the webpage content
 */
class Video extends OpenGraphProtocolVisualMedia {

    /**
     * Map a file extension to a registered Internet media type
     * Include Flash as a video type due to its popularity as a wrapper
     *
     * @link http://www.iana.org/assignments/media-types/video/index.html IANA video types
     * @param string $extension file extension
     * @return string|void Internet media type in the format video/* or Flash
     */
    public static function extension_to_media_type( $extension ) {
        if ( empty($extension) || ! is_string($extension) )
            return;
        if ( $extension === 'swf' )
            return 'application/x-shockwave-flash';
        else if ( $extension === 'mp4' )
            return 'video/mp4';
        else if ( $extension === 'ogv' )
            return 'video/ogg';
        else if ( $extension === 'webm' )
            return 'video/webm';
    }

    /**
     * Set the Internet media type. Allow only video types + Flash wrapper.
     *
     * @param string $type Internet media type
     * @return Video
     */
    public function setType( $type ) {
        if ( $type === 'application/x-shockwave-flash' || substr_compare( $type, 'video/', 0, 6 ) === 0 )
            $this->type = $type;
        return $this;
    }
}