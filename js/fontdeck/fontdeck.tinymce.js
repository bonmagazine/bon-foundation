(function() {
	tinymce.create('tinymce.plugins.fontdeck', {
		init: function(ed, url) {
			ed.onPreInit.add(function(ed) {
 
				// Get the DOM document object for the IFRAME
				var doc = ed.getDoc();
 WebFontConfig = { fontdeck: { id: 'XXXXX' } };
 
				// Create the script we will add to the header asynchronously
				var jscript = "WebFontConfig = { fontdeck: { id: '30102' } };\n\
				  (function() {\n\
				  var wf = document.createElement('script');\n\
				  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';\n\
				  wf.type = 'text/javascript';\n\
				  wf.async = 'true';\n\
				  var s = document.getElementsByTagName('script')[0];\n\
				  s.parentNode.insertBefore(wf, s);\n\
				})()";
					
 
				// Create a script element and insert the TypeKit code into it
				var script = doc.createElement("script");
				script.type = "text/javascript";
				script.appendChild(doc.createTextNode(jscript));
 
				// Add the script to the header
				doc.getElementsByTagName('head')[0].appendChild(script);
 
			});
 
		},
		getInfo: function() {
			return {
				longname: 'TypeKit For FontDeck',
				author: 'Tom J Nowell, adapted by Erik Hartin',
				authorurl: 'http://google.com',
				infourl: 'http://google.com',
				version: "1.2"
			};
		}
	});
	tinymce.PluginManager.add('fontdeck', tinymce.plugins.fontdeck);
})();