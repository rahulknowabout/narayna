<!--<html> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <title>Translate English to Hindi</title> <script type="text/javascript" src="http://www.google.com/jsapi"></script> <script type="text/javascript"> google.load("elements", "1", { packages: "transliteration" }); function onLoad() { var options = { sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH, destinationLanguage: [google.elements.transliteration.LanguageCode.HINDI], shortcutKey: 'ctrl+g', transliterationEnabled: true };   var control = new google.elements.transliteration.TransliterationControl(options);   // Enable transliteration in the editable elements with id // 'transliterateDiv'. control.makeTransliteratable(['transliterateDiv']); control.makeTransliteratable(['transliterateDiv2']); } google.setOnLoadCallback(onLoad); </script> </head> <body> <textarea name="description" cols="100" rows="10" style="border:1px solid #999999; color:#333333; font-size:12px;" id="transliterateDiv"></textarea> <textarea name="description2" cols="100" rows="10" style="border:1px solid #999999; color:#333333; font-size:12px;" id="transliterateDiv2"></textarea> </body> </html>  See more at: http://www.naveenos.com/2010/12/translate-english-to-hindi-by-google-api#sthash.1VQKkvqY.dpuf<html>-->
  <!--<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <link href="http://www.google.com/uds/modules/elements/transliteration/api.css"
      type="text/css" rel="stylesheet"/>
    <script type="text/javascript">
      // Load the Google Transliteration API
      google.load("elements", "1", {
            packages: "transliteration"
          });
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                google.elements.transliteration.LanguageCode.HINDI,
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(['transliterateTextarea']);
      }
      google.setOnLoadCallback(onLoad);
    </script>
  </head>
  <body>

    Type in Hindi (Press Ctrl+g to toggle between English and Hindi)<br>
    <a href="#" onClick="document.getElementById('Wrapper').style.display = 'block'; return false;">show textarea</a>
    <div id="Wrapper" style="display:none"> <h2> Textarea </h2>
    <textarea id="transliterateTextarea" style="width:600px;height:200px"></textarea>
    </div>
	<div id="transliterateTextarea">
	Rahul Sharma
	</div>
  </body>
-->
<!--<script type="text/javascript" src="http://www.google.com/jsapi"></script><script language="javascript">var gtc_stl='http://translateclient.com/js/widget/gtc.css';</script><script type="text/javascript" src="http://translateclient.com/js/widget/gtc.js"></script><script language="javascript">translateclient.srclang="en";translateclient.checkload();gtc_ws=1;</script><div id="gtc_pan"><div id="gtc_t">Select a text on the page and get translation from Google Translate!</div><label><input id="gtc_chk" type="checkbox" checked="checked" />Translate to </label><select id="gtc_lang"></select><br><a id="gtc_w" href=""></a> <a id="gtc_d" href="http://translateclient.com">Google Translate Client</a></div><p>Rahul</p><body>-->
<!-- TranslateClient END -->
<html>
<head>
 <script type="text/javascript" src="http://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("language", "1");
 function initialize() {
   var text = document.getElementById("text").innerHTML;
   //alert(text);
   google.language.detect(text, function(result) {
     if (!result.error && result.language) {
	 	alert("hello");
       google.language.translate(text, result.language, "hi",
                                 function(result) {
         var translated = document.getElementById("translation");
         if (result.translation) {
           translated.innerHTML = result.translation;
         }
       });
     }
   });
 }
 google.setOnLoadCallback(initialize);
 </script>
</head>
<body>
 <div id="text">rahul</div>
 <div id="translation"></div>
</body>
</html>
<!--   Google Translate           -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!----       Google Translate -->
<!---

Paste this code onto your website

Copy and paste the following code snippets onto every page you want to translate
Do not remove, conceal or alter the Google logo that is presented in websites containing the plugin.
Place this snippet where you'd like to display the Website Translator plugin on your page




-->   

<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--
Give it a spin!

Now, unless you selected the automatic display mode option, you should see a language selector on your page.     
-->