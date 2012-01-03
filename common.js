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
  <li><a href="http://groups.google.com/group/minixml">Mailing List</a><li>\
  <li><a href="https://github.com/michaelrsweet/Mini-XML/wiki/News">News/Wiki</a></li>\
  <li><a href="https://github.com/michaelrsweet/Mini-XML">Repository</a></li>\
</ul>';

  if (document.anchors.length > 0)
  {
    contents = contents + '\n<li id="sideheading">This Page</li>';
    for (i = 0; i < document.anchors.length; i ++)
      contents = contents + '\n  <li><a href="#' + document.anchors[i].name +
                 '">' + document.anchors[i].innerHTML + '</a></li>';
  }

  contents = contents + '\n</ul>';

  document.getElementById('sidebar').innerHTML = contents;
}
