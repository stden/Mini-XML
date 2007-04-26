<?php
//
// "$Id$"
//
// Mini-XML documentation page...
//

//
// Include necessary headers...
//

include_once "phplib/html.php";
include_once "phplib/common.php";


//
// Get the web server path information and serve the named file as needed...
//

if (array_key_exists("PATH_INFO", $_SERVER) &&
    $_SERVER["PATH_INFO"] != "/" &&
    $_SERVER["PATH_INFO"] != "")
{
  $path = "$_SERVER[PATH_INFO]";

  if (fnmatch("*.gif", $path))
    $type = "gif";
  else if (fnmatch("*.jpg", $path))
    $type = "jpeg";
  else if (fnmatch("*.png", $path))
    $type = "png";
  else
    $type = "html";

  if (strstr($path, ".."))
  {
    if ($type == "html")
    {
      html_header("Documentation Error", "../");

      print("<h1>Documentation Error</h1>\n"
           ."<p>The path '$path' is bad.</p>\n");

      html_footer("../");
    }
  }
  else
  {
    $fp = fopen("docfiles$path", "rb");
    if (!$fp)
    {
      if ($type == "html")
      {
	html_header("Documentation Error", "../");

	print("<h1>Documentation Error</h1>\n"
             ."<p>Unable to open path '$path'.</p>\n");

	html_footer("../");
      }
    }
    else if ($type == "html")
    {
      html_header("Documentation", "../");

      $saw_body = 0;
      $last_nav = 0;

      while ($line = fgets($fp, 1024))
      {
        if (strstr($line, "<BODY"))
	{
	  $saw_body = 1;
	}
	else if (strstr($line, "</BODY>"))
	{
	  break;
	}
	else if ($saw_body)
	{
	  if (strstr($line, ">Contents</A") ||
	      strstr($line, ">Previous</A>") ||
	      strstr($line, ">Next</A>"))
	  {
	    if ($last_nav)
	      print("|\n");
	    else
	      print("[ <A HREF='#_USER_COMMENTS'>Comments</a></li> |\n");

            $last_nav = 1;
	  }
	  else if (strstr($line, "<HR"))
	  {
	    if ($last_nav)
	      print("]\n");

	    $last_nav = 0;
	  }

	  print($line);
	}
      }

      fclose($fp);

      if ($last_nav)
        print("]\n");

      print("<hr noshade/>\n"
           ."<h2><a name='_USER_COMMENTS'>User Comments</a> [&nbsp;"
	   ."<a href='../comment.php?r0+pdocumentation.php$path'>Add&nbsp;Comment</a>"
	   ."&nbsp;]</h2>\n");

      $num_comments = show_comments("documentation.php$path", "../");

      if ($num_comments == 0)
        print("<p>No comments for this page.</p>\n");

      html_footer("../");
    }
    else
    {
      header("Content-Type: image/$type");
      
      print(fread($fp, filesize("docfiles$path")));

      fclose($fp);
    }
  }
}
else
{
  html_header("Documentation");

?>

<h1>Documentation</h1>

<p>You can view the Mini-XML documentation in a single HTML file or in
multiple files with comments on-line:</p>

<ul>

	<li><a href='mxml.html'>HTML in one file (140k)</a></li>

	<li><a href='documentation.php/toc.html'>HTML in
	separate files with Comments</a>

	<ul>

		<li><a
		href='documentation.php/Introduction.html'>Introduction</a></li>

		<li><a
		href='documentation.php/BuildingInstallingandPackagingMiniXML.html'>Building,
		Installing, and Packaging Mini-XML</a></li>

		<li><a
		href='documentation.php/GettingStartedwithMiniXML.html'>Getting
		Started with Mini-XML</a></li>

		<li><a
		href='documentation.php/MoreMiniXMLProgrammingTechniques.html'>More
		Mini-XML Programming Techniques</a></li>

		<li><a
		href='documentation.php/UsingthemxmldocUtility.html'>Using
		the mxmldoc Utility</a></li>

		<li><a
		href='documentation.php/MiniXMLLicense.html'>Mini-XML
		License</a></li>

		<li><a
		href='documentation.php/ReleaseNotes.html'>Release
		Notes</a></li>

		<li><a
		href='documentation.php/LibraryReference.html'>Library
		Reference</a></li>

	</ul></li>

</ul>

<?php

  html_footer();
}

//
// End of "$Id$".
//
?>
