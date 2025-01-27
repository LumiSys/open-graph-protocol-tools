<?php /** @noinspection PhpUnused */


namespace OpenGraph\Media;


use OpenGraph\Media as OpenGraphProtocolMedia;

/**
 * Audio file suitable for playback alongside the main linked content
 */
class Audio extends OpenGraphProtocolMedia {

    /**
     * Map a file extension to a registered Internet media type
     * Include Flash as a video type due to its popularity as a wrapper
     *
     * @link http://www.iana.org/assignments/media-types/audio/index.html IANA video types
     * @param string $extension file extension
     * @return string|void Internet media type in the format audio/* or Flash
     */
    public static function extension_to_media_type( $extension ) {
        if ( empty($extension) || ! is_string($extension) )
            return;
        if ( $extension === 'swf' )
            return 'application/x-shockwave-flash';
        else if ( $extension === 'mp3' )
            return 'audio/mpeg';
        else if ( $extension === 'm4a' )
            return 'audio/mp4';
        else if ( $extension === 'ogg' || $extension === 'oga' )
            return 'audio/ogg';
    }

    /**
     * Set the Internet media type. Allow only audio types + Flash wrapper.
     *
     * @param string $type Internet media type
     * @return Audio
     */
    public function setType( $type ) {
        if ( $type === 'application/x-shockwave-flash' || substr_compare( $type, 'audio/', 0, 6 ) === 0 )
            $this->type = $type;
        return $this;
    }
}