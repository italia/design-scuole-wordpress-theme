# vallenato.js
Vallenato is a simple, easy to install jQuery accordion script.

[View Demo](https://www.switchroyale.com/vallenato)

## Dependencies
This script requires jQuery to function.

## Setup
Link to the CSS and JS files:

```html
<link rel="stylesheet" href="vallenato.css">

<script src="jquery.js"></script>
<script src="vallenato.js"></script>
```

## Structure
Setup your HTML like code in the example below:

```html
<div class="vallenato">
	<div class="vallenato-header">
		Header 1
	</div><!--/.vallenato-header-->

	<div class="vallenato-content">
		Your Content...
	</div><!--/.vallenato-content-->

	<div class="vallenato-header">
		Header 2
	</div><!--/.vallenato-header-->

	<div class="vallenato-content">
		Your Content...
	</div><!--/.vallenato-content-->
</div><!--/.vallenato-->
```

## Run the Function
Simply add the vallenato() function to your site to enable the accordion.

```javascript
<script>
	$(document).ready(function() {
		vallenato();
	});
</script>
```
