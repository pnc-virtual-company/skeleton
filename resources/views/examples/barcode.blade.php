@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            
            <h1>Barcode generator</h1>

            <p>Please visit the Github project for more details: <a href="https://github.com/picqer/php-barcode-generator" target="_blank">https://github.com/picqer/php-barcode-generator</a></p>
            
            <p>The code below generates the HTML code needed to output a CODE128 barcode:</p>
            
<pre>
    $generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
    echo $generatorHTML->getBarcode('081231723897', $generatorHTML::TYPE_CODE_128);
</pre>

<iframe src="{{URL::to('examples/barcode/generate?format=html&type=code128&message=081231723897')}}"></iframe>

            <br />
            
            <p>Instead of HTML, we can generate a PNG image:</p>
            
<pre>
    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '&lt;img src="data:image/png;base64,' .
     base64_encode($generatorPNG->getBarcode('081231723897', $generatorPNG::TYPE_CODE_128)) . '"&gt;';
</pre>

<img src="{{URL::to('examples/barcode/generate?format=png&type=code128&message=081231723897')}}">

            <br />            
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {

});
</script>
@endpush
