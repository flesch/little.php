Little
-------------

"Little" is a *very* simple URL shortener. I challenged myself to create it in an hour while [drinking](http://stackoverflow.com/questions/184618/what-is-the-best-comment-in-source-code-you-have-ever-encountered/185181#185181).

There isn't an interface to it. To create a short URL, just use a `GET` request.

    GET http://fles.ch/http://github.com/johnflesch/little

You'll get a response with the short URL in the body:

    HTTP/1.1 200 OK
    Date: Sat, 03 Jul 2010 04:25:16 GMT
    Server: Apache
    Cache-Control: no-cache, must-revalidate
    Expires: Sat, 03 Jul 2010 04:25:17 GMT
    X-Powered-By: api.fles.ch
    Last-Modified: Sat, 03 Jul 2010 04:25:16 GMT
    Content-Length: 35
    Content-Type: text/plain
    
    "http://fles.ch/6jxoda"

I also included a feature to display an expanded URL without redirecting you. Include a + after the short code:

    GET http://fles.ch/6jxoda+

You'll get a response like:

    HTTP/1.1 200 OK
    Date: Sat, 03 Jul 2010 04:25:16 GMT
    Server: Apache
    Cache-Control: no-cache, must-revalidate
    Expires: Sat, 03 Jul 2010 04:25:17 GMT
    X-Powered-By: api.fles.ch
    Last-Modified: Sat, 03 Jul 2010 04:25:16 GMT
    Content-Length: 35
    Content-Type: text/plain
    
    "http://github.com/johnflesch/little"