## Slack-Alexa
query some site's rank in Alexa.

### Setup
1. put this php file to your web server.
		
2. [Create a new Slack Slash Command](https://my.slack.com/services/new/slash-commands)

		Example:
			Commend: /alexa
			URL: the php file's url
			Method: POST

3. [Create an incoming webhook](https://my.slack.com/services/new/incoming-webhook). Setup the Channel, Customize Name, Customize Icon, Copy the 'Webhook URL' and Save Settings.

4. Config the PHP file.

		$incoming_webhook_url = 'Incoming Webhook URL';
    	$username = 'Incoming Customize Name';
    	$icon = 'Incoming Customize Icon';
    	
### Usage
	/alexa site_url

### License
the [MIT License](http://en.wikipedia.org/wiki/MIT_License).
