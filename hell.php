<?php

// PHP kodu
$phpCode = '<?php echo "Hello, World!"; ?>';

// Diziyi sıkıştırın veya şifreleyin
$compressedCode = gzcompress($phpCode);

// Şifreli veya sıkıştırılmış diziyi bir PNG dosyası içinde yerleştirin
$imageData = base64_encode($compressedCode);
$imageSrc = 'data:image/png;base64,' . $imageData;

// PNG dosyasını oluşturun
$image = imagecreatefrompng('path/to/template.png'); // Şablon PNG dosyası
$color = imagecolorallocate($image, 0, 0, 0); // Metin rengi
imagettftext($image, 12, 0, 10, 20, $color, 'path/to/font.ttf', $imageSrc); // Metni yerleştirin

// PNG dosyasını kaydedin veya ekrana gönderin
header('Content-Type: image/png');
imagepng($image, 'path/to/output.png'); // Dosyaya kaydetmek için
imagedestroy($image);

?>
