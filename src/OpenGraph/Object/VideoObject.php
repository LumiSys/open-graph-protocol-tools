<?php /** @noinspection PhpUnused */


namespace OpenGraph\Object;


use DateTime;
use OpenGraph\Object as OpenGraphProtocolObject;
use OpenGraph\Object\VideoObject as OpenGraphProtocolVideoObject;

/**
 * Video movie, TV show, and other all share the same properies.
 * Video episode extends this class to associate with a TV show
 *
 * @link http://ogp.me/#type_video Open Graph protocol video object
 */
class VideoObject extends OpenGraphProtocolObject {
    /**
     * Property prefix
     * @var string
     */
    const PREFIX = 'video';

    /**
     * prefix namespace
     * @var string
     */
    const NS = 'http://ogp.me/ns/video#';

    /**
     * Array of actor URLs
     * @var array
     */
    protected $actor;

    /**
     * Array of director URLs
     * @var array
     */
    protected $director;

    /**
     * Array of writer URIs
     * @var array
     */
    protected $writer;

    /**
     * Video duration in whole seconds
     * @var int
     */
    protected $duration;

    /**
     * The date the movie was first released. ISO 8601 formatted string
     * @var string
     */
    protected $release_date;

    /**
     * Tag words associated with the movie
     * @var array
     */
    protected $tag;

    public function __construct() {
        $this->actor = array();
        $this->director = array();
        $this->writer = array();
        $this->tag = array();
    }

    /**
     * Get an array of actor URLs
     *
     * @return array actor URLs
     */
    public function getActors() {
        return $this->actor;
    }

    /**
     * Add an actor URL with an optional role association
     *
     * @param string $url Author URL of og:type profile
     * @param string $role The role the given actor played in this video work.
     * @return VideoObject
     */
    public function addActor( $url, $role='' ) {
        if ( static::is_valid_url($url) && !in_array($url, $this->actor) ) {
            if ( !empty($role) && is_string($role) )
                $this->actor[] = array( $url, 'role' => $role );
            else
                $this->actor[] = $url;
        }
        return $this;
    }

    /**
     * An array of director URLs
     *
     * @return array director URLs
     */
    public function getDirectors() {
        return $this->director;
    }

    /**
     * Add a director profile URL
     *
     * @param string $url director profile URL
     * @return VideoObject
     */
    public function addDirector( $url ) {
        if ( static::is_valid_url($url) && !in_array($url, $this->director) )
            $this->director[] = $url;
        return $this;
    }

    /**
     * An array of writer URLs
     *
     * @return array writer URLs
     */
    public function getWriters() {
        return $this->writer;
    }

    /**
     * Add a writer profile URL
     *
     * @param string $url writer profile URL
     *
     * @return OpenGraphProtocolVideoObject
     */
    public function addWriter( $url ) {
        if ( static::is_valid_url($url) && !in_array($url, $this->writer) )
            $this->writer[] = $url;

        return $this;
    }

    /**
     * Duration of the video in whole seconds
     *
     * @return int duration in whole seconds
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * Set the video duration in whole seconds
     *
     * @param int $duration video duration in whole seconds
     * @return VideoObject
     */
    public function setDuration( $duration ) {
        if ( is_int($duration) && $duration > 0 )
            $this->duration = $duration;
        return $this;
    }

    /**
     * The release date as an ISO 8601 formatted string
     *
     * @return string release date as an ISO 8601 formatted string
     */
    public function getReleaseDate() {
        return $this->release_date;
    }

    /**
     * Set the date this video was first released
     *
     * @param DateTime|string $release_date date video was first released
     * @return VideoObject
     */
    public function setReleaseDate( $release_date ) {
        if ( $release_date instanceof DateTime )
            $this->release_date = static::datetime_to_iso_8601($release_date);
        else if ( is_string($release_date) && strlen($release_date) >= 10 ) // at least YYYY-MM-DD
            $this->release_date = $release_date;
        return $this;
    }

    /**
     * An array of tag words associated with this video
     *
     * @return array tags
     */
    public function getTags() {
        return $this->tag;
    }

    /**
     * Add a tag word or topic related to this video
     *
     * @param string $tag tag word or topic
     * @return VideoObject
     */
    public function addTag( $tag ) {
        if ( is_string($tag) && !in_array($tag, $this->tag) )
            $this->tag[] = $tag;
        return $this;
    }
}