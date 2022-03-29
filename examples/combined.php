<?php

use OpenGraph\Media\Audio as OpenGraphProtocolAudio;
use OpenGraph\Media\Image as OpenGraphProtocolImage;
use OpenGraph\Media\Video as OpenGraphProtocolVideo;
use OpenGraph\Object\Article as OpenGraphProtocolArticle;
use OpenGraph\Protocol as OpenGraphProtocol;

require dirname(__DIR__) . '/vendor/autoload.php';

$image = new OpenGraphProtocolImage();
$image->setURL( 'http://example.com/image.jpg' );
$image->setSecureURL( 'https://example.com/image.jpg' );
$image->setType( 'image/jpeg' );
$image->setWidth( 400 );
$image->setHeight( 300 );

$video = new OpenGraphProtocolVideo();
$video->setURL( 'http://example.com/video.swf' );
$video->setSecureURL( 'https://example.com/video.swf' );
$video->setType( OpenGraphProtocolVideo::extension_to_media_type( pathinfo( parse_url( $video->getURL(), PHP_URL_PATH ), PATHINFO_EXTENSION ) ) );
$video->setWidth( 500 );
$video->setHeight( 400 );

$audio = new OpenGraphProtocolAudio();
$audio->setURL( 'http://example.com/audio.mp3' );
$audio->setSecureURL( 'https://example.com/audio.mp3' );
$audio->setType('audio/mpeg');

$ogp = new OpenGraphProtocol();
$ogp->setLocale( 'en_US' );
$ogp->setSiteName( 'Happy place' );
$ogp->setTitle( 'Hello world' );
$ogp->setDescription( 'We make the world happy.' );
$ogp->setType( 'website' );
$ogp->setURL( 'http://example.com/' );
$ogp->setDeterminer( 'the' );
$ogp->addImage($image);
$ogp->addAudio($audio);
$ogp->addVideo($video);

$article = new OpenGraphProtocolArticle();
$article->setPublishedTime( '2011-11-03T01:23:45Z' );
$article->setModifiedTime( date_create( 'now', new DateTimeZone( 'America/Los_Angeles' ) ) );
$article->setExpirationTime( '2011-12-31T23:59:59+00:00' );
$article->setSection( 'Front page' );
$article->addTag( 'weather' );
$article->addTag( 'football' );
$article->addAuthor( 'http://example.com/author.html' );

$ogp_objects = array( $ogp, $article );
$prefix = '';
$meta = '';
foreach ( $ogp_objects as $ogp_object ) {
    $prefix .= $ogp_object::PREFIX . ': ' . $ogp_object::NS . ' ';
    $meta .= $ogp_object->toHTML() . PHP_EOL;
}
?>
<head prefix="<?php echo rtrim( $prefix,' ' ); ?>">
    <?php echo rtrim( $meta, PHP_EOL ); ?>
