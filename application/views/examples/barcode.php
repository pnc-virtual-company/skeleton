<h1>Barcode generator</h1>

<p>Please visit the Github project for more details: <a href="https://github.com/picqer/php-barcode-generator" target="_blank">https://github.com/picqer/php-barcode-generator</a></p>

<p>The code below generator the HTML needed to output a CODE128 barcode:</p>

<pre>
  $generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
  echo $generatorHTML->getBarcode('081231723897', $generatorHTML::TYPE_CODE_128);
</pre>
<br />
<?php
require_once FCPATH . "vendor/autoload.php";

$generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
echo $generatorHTML->getBarcode('081231723897', $generatorHTML::TYPE_CODE_128);
?>
<br />

<p>Instead of HTML, we can generate a PNG image:</p>

<pre>
  $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
  echo '&lt;img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode('081231723897', $generatorPNG::TYPE_CODE_128)) . '"&gt;';
</pre>
<br />
<?php
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
echo '<img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode('081231723897', $generatorPNG::TYPE_CODE_128)) . '">';
?>
