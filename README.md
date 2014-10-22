importio-signedserver-heroku
============================

import.io Signed Query Server for Heroku

Inspired by [importio-signer-heroku](https://github.com/weltonrodrigo/importio-signer-heroku) by @weltonrodrigo. And, of course, @import-io.

## Step-by-step

### Get the code:

Via GitHub:
```bash
git clone https://github.com/infiniteschema/importio-signedserver-heroku.git
cd importio-signedserver-heroku
```

### Add your custom query validator (optional):

In web/my.php edit function my_validate

### Send app to Heroku:
```bash
heroku login
heroku create
git push heroku master

heroku config:set USER_GUID=YOUR_USER_GUID
heroku config:set API_KEY=YOUR_API_KEY
```

### In your code:

```javascript
importio.init({
             "auth": "http://YOUR-APP-NAME.herokuapp.com/",
             "host": "import.io"
});
```

## References

* https://import.io/docs/signedserver.html
* http://stackoverflow.com/questions/15231937/heroku-and-github-at-the-same-time
* http://jayunit100.blogspot.com/2012/05/how-git-heroku-and-your-laptop-work.html
* https://github.com/import-io/importio-client-libs

## Donate
* Bitcoin: 13DSUhqLJjKRe5MyJuHjK7WPi9gshnkubL
* https://www.coinbase.com/InfiniteSchema

