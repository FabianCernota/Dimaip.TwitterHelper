# NeosCMS EEL Helper to access Twitter API

## TL;DR

gk1. Install the package: `composer require dimaip/twitterhelper:dev`
2. Go to https://apps.twitter.com/ and create new app.
3. Go to "Keys and Access Tokens" tab and copy the access tokens to your `Settings.yaml` file in the following way:

```
Dimaip:
  TwitterHelper:
    oauthAccessToken: XXX
    oauthAccessTokenSecret: XXX
    consumerKey: XXX
    consumerSecret: XXX
```

That's all! Now you can use the ready-made `Dimaip.TwitterHelper:Timeline` TS object, e.g.:

```
root = Dimaip.TwitterHelper:Timeline {
	user = 'neoscms'
	count = 100
}
```

To adjust the looks, alter the `Dimaip.TwitterHelper:Tweet` TS object. It has `tweet` context variable with all of the fields described here: https://dev.twitter.com/overview/api/tweets

Or you can use the EEL helper directly to make any kind of GET request to the Twitter API:
`${Twitter.getRequest('statuses/user_timeline', 'screen_name=neoscms&count=10')}`

The EEL helper takes two arguments: Twitter API endpoint name and get arguments for that endpoint.

**The development of this plugin was kindly sponsored by [CODE Q](https://www.codeq.at/)

[!CodeQ](codeq.png)

**[Get in touch](dimaip.github.io/hire/) with me if you need to get something nice and Neos-y done ;)**
