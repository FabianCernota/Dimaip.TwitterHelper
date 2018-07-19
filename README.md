# NeosCMS EEL Helper to access Twitter API

## TL;DR

1. Install the package: `composer require fabiancernota/twitterhelper:dev-master`
2. Go to https://apps.twitter.com/ and create a new app with read-only permissions.
3. Go to "Keys and Access Tokens" tab and copy the access tokens to your `Settings.yaml` file in the following way:

```
FabianCernota:
  TwitterHelper:
    oauthAccessToken: XXX
    oauthAccessTokenSecret: XXX
    consumerKey: XXX
    consumerSecret: XXX
```

That's all! Now you can use the ready-made `FabianCernota.TwitterHelper:Timeline` TS object, e.g.:

```
root = FabianCernota.TwitterHelper:Timeline {
	user = 'neoscms'
	count = 100
}
```

To adjust the looks, alter the `FabianCernota.TwitterHelper:Tweet` TS object. It has `tweet` context variable with all of the fields described here: https://dev.twitter.com/overview/api/tweets

Or you can use the EEL helper directly to make any kind of GET request to the Twitter API, e.g.:
`${Twitter.getRequest('statuses/user_timeline', 'screen_name=neoscms&count=10')}`

The EEL helper takes two arguments: Twitter API GET endpoint name and GET arguments for that endpoint.

