<?php

use OpenGraph\Object\Article as OpenGraphProtocolArticle;

require dirname(__DIR__) . '/vendor/autoload.php';

$article = new OpenGraphProtocolArticle();
$article->setPublishedTime( '2011-11-03T01:23:45Z' );
$article->setModifiedTime( date_create( 'now', new DateTimeZone( 'America/Los_Angeles' ) ) );
$article->setExpirationTime( '2011-12-31T23:59:59+00:00' );
$article->setSection( 'Front page' );
$article->addTag( 'weather' );
$article->addTag( 'football' );
$article->addAuthor( 'http://example.com/author.html' );

echo $article->toHTML();
