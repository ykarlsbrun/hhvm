<?php
/* Prototype: bool symlink ( string $target, string $link );
   Description: creates a symbolic link to the existing target with the specified name link

   Prototype: bool is_link ( string $filename );
   Description: Tells whether the given file is a symbolic link.

   Prototype: bool link ( string $target, string $link );
   Description: Create a hard link

   Prototype: int linkinfo ( string $path );
   Description: Gets information about a link
*/

$file_path = dirname(__FILE__);

echo "*** Testing symlink(), linkinfo(), link() and is_link() : basic functionality ***\n";

/* Creating soft/hard link to the temporary dir $dirname and checking
   linkinfo() and is_link() on the link created to $dirname */

$dirname = "symlink_link_linkinfo_is_link_basic2";
mkdir($file_path."/".$dirname);

echo "\n*** Testing symlink(), linkinfo(), link() and is_link() on directory ***\n";

// name of the soft link created to $dirname
$sym_linkname = "$file_path/$dirname/symlink_link_linkinfo_is_link_softlink_basic2.tmp";

// name of the hard link created to $dirname
$linkname = "$file_path/$dirname/symlink_link_linkinfo_is_link_hardlink_basic2.tmp";

// testing on soft link
echo "\n-- Testing on soft links --\n";
// creating soft link to $dirname
var_dump( symlink("$file_path/$dirname", $sym_linkname) ); // this works, expected true
// gets information about soft link created to directory; expected: true
var_dump( linkinfo($sym_linkname) );
// checks if link created is soft link; expected: true
var_dump( is_link($sym_linkname) );
// clear the cache
clearstatcache();

// testing on hard link
echo "\n-- Testing on hard links --\n";
// creating hard link to $dirname; expected: false
var_dump( link("$file_path/$dirname", $linkname) ); // this doesn't work, expected false
var_dump( linkinfo($linkname) ); // link doesn't exists as not created, expected false
var_dump( is_link($linkname) ); // link doesn't exists as not created, expected false
// clear the cache
clearstatcache();

// deleting the links
unlink($sym_linkname);

echo "Done\n";
?>
<?php error_reporting(0); ?>
<?php
$dirname = dirname(__FILE__)."/symlink_link_linkinfo_is_link_basic2";
rmdir($dirname);
?>