# little.php

`little.php` is a *very* simple URL shortener. I challenged myself to create it in an **hour** [while drinking](http://stackoverflow.com/questions/184618/what-is-the-best-comment-in-source-code-you-have-ever-encountered/185181#185181). *I've since cleaned up this readme since then, but otherwise the original code remains.*

There isn't an interface to it. To create a short URL, just use a `GET` request (through your browser or `cURL`).

## Shorten

    curl -X GET http://localhost/http://github.com/johnflesch/little.php

You'll get a response with the little URL in the body:

    HTTP/1.1 200 OK
    Content-Type: text/plain

    http://fles.ch/6jxoda

## Expand

Hitting the little URL will `302` redirect you to the long url. `little.php` includes a feature to simply expand the little url, instead of redirecting you. Just include a + (plus sign) after the short code:

    curl -X GET http://fles.ch/6jxoda+

You'll get a response like:

    HTTP/1.1 200 OK
    Content-Type: text/plain
    
    http://github.com/johnflesch/little.php