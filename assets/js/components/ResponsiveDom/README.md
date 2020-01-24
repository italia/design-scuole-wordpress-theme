# Responsive DOM

Sometimes CSS media queries alone are not enough to create the desired layout
when creating responsive websites. If you need to move an element to another
position in the DOM based on a media query match, then this plugin can help.

## Usage

Include jQuery and this plugin in your page, either in the `<head>` or before your
`</body>` tag.

```html
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/jquery.responsive-dom.min.js"></script>
```

Call the Responsive DOM plugin on the element you want to relocate. The following
example will move the page's navigation to the end of the sidebar when the viewport
width is greater than or equal to 600px.

```javascript
var $mainNav = $('.main-nav');

$mainNav.responsiveDom({
	appendTo: '.sidebar',
	mediaQuery: '(min-width: 600px)'
});
```

A callback function is also available that will run whenever the DOM is updated.

```javascript
$mainNav.responsiveDom({
	appendTo: '.sidebar',
	mediaQuery: '(min-width: 600px)',
	callback: function(mediaMatched) {
		if (mediaMatched) {
			console.log('The navigation was moved to the sidebar.');
		}
	}
});
```
