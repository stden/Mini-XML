/* Sidebar loading code - we do it here to avoid changing it on every page */
function load_sidebar() {
  contents =
'<p>mini<br>\
XML<br>\
<ul>\
  <li><a href="index.html">Home</a></li>\
  <li><a href="documentation/index.html">Documentation</a></li>\
  <li><a href="https://github.com/michaelrsweet/Mini-XML/downloads">Download</a></li>\
  <li><a href="https://github.com/michaelrsweet/Mini-XML/issues">Issues</a></li>\
  <li><a href="https://github.com/michaelrsweet/Mini-XML/wiki/News">News/Wiki</a></li>\
  <li><a href="https://github.com/michaelrsweet/Mini-XML">Repository</a></li>\
</ul>';

  if (document.anchors.length > 0)
  {
    contents = contents + '\n<p>This Page:</p>\n<ul>\n';
    for (i = 0; i < document.anchors.length; i ++)
      contents = contents + '  <li><a href="#' + document.anchors[i].name +
                 '">' + document.anchors[i].innerHTML + '</a></li>\n';
    contents = contents + '</ul>';
  }

  document.getElementById('sidebar').innerHTML = contents;
}
