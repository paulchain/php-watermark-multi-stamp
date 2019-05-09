<?php
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('stamp.png');
$im = imagecreatefromjpeg('photo.jpg');

// get stamp and photo dimension size
$ix = imagesx($im);
$iy = imagesy($im);
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// get the size ratio between photo and stmap
$x = (int)($ix/$sx);
$y = (int)($iy/$sy);

// loop the ratio and copy the stamp to the photo 
for($i=0; $i<=$x; $i++) {
	for($j=0; $j<=$y; $j++) {
		imagecopy($im, $stamp, $sx*$i, $sy*$j, 0, 0, $sx, $sy);
	}
}
//Output and free memory
$filename = 'after.png';
imagepng($im, $filename);
imagedestroy($im);

echo "Created watermark successful";

?>