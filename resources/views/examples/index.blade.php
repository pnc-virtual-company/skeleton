@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
                <h1>Matrix of widgets and libraries</h1>

                <p>
                <input type="search" class="light-table-filter" data-table="order-table" placeholder="Search">
                </p>
                
                <table class="table order-table">
                  <thead>
                    <tr>
                      <th>Objective</th>
                      <th>Widget</th>
                      <th>Example</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Export a list into Excel</td>
                      <td>PHPSpreadsheet</td>
                      <td><a href="{{ url('users') }}">List of users</a>, click on <code>export this list</code></td>
                    </tr>
                    <tr>
                      <td>Login form</td>
                      <td>Bootstrap + JQuery</td>
                      <td>Try to access to the list of users while logged out or to the <a href="{{ url('login') }}">login page</a></td>
                    </tr>
                    <tr>
                      <td>Send an email</td>
                      <td>Laravel email library</td>
                      <td>
                        <a href="{{ url('examples/emails') }}">Send an email</a> and test with a Fake SMTP server.
                        Another example can be found when the user is created.
                      </td>
                    </tr>
                    <tr>
                      <td>Translate the application</td>
                      <td>Laravel i18n library</td>
                      <td><a href="{{ url('examples/translation') }}">examples / Translation</a></td>
                    </tr>
                    <tr>
                      <td>List/Manage data using a table</td>
                      <td>JQuery DataTable</td>
                      <td><a href="{{ url('users') }}">List of users</a></td>
                    </tr>
                    <tr>
                      <td>Create charts</td>
                      <td><a href="{{ url('examples/chartjs') }}">ChartJS</a></td>
                      <td>Create beautiful bar charts, line charts or pie charts on the frontend</td>
                    </tr>
                    <tr>
                      <td>Change default font</td>
                      <td>Google noto font</td>
                      <td>
                        We can use many fonts (that you can download for free on the Internet).
                        But we prefer you to use <a href="{{ url('examples/noto') }}">Google noto</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Random profile pictures</td>
                      <td>Royalty free faces</td>
                      <td>
                        Take a look at the folder <code>public/images/examples/faces/</code>
                        <img id="imgProfilePic" src="{{url('images/examples/faces/m34.jpg')}}" class="img-fluid rounded mx-auto d-block"/>
                      </td>
                    </tr>
                    <tr>
                        <td>Select a date or time</td>
                        <td>Date picker</td>
                        <td>You can find two examples of datepicker <a href="{{ url('examples/datepicker') }}">here</a></td>
                    </tr>
                    <tr>
                        <td>Autocomplete widget</td>
                        <td>Select2</td>
                        <td><a href="{{ url('examples/select2') }}">Select2</a> enhance the SELECT tag by adding automatic filter.
                          Then it would achieve a result similar to autocompletion.</td>
                    </tr>
                    <tr>
                        <td>Text Editor</td>
                        <td>TinyMCE</td>
                        <td>
                          <a href="{{ url('examples/richtexteditor') }}">TinyMCE</a> is a powerful text editor with penty of plugins.
                          The demo only features the image and links plugins. So do not hesitate to read the documentation.
                        </td>
                    </tr>
                    <tr>
                        <td>Treeview</td>
                        <td>JsTree</td>
                        <td><a href="{{ url('examples/treeview') }}">JsTree</a> allows you to present hierarchical data.</td>
                    </tr>
                    <tr>
                        <td>Generate PDF</td>
                        <td>dompdf</td>
                        <td><a href="{{ url('examples/pdf') }}">dompdf</a> is a PHP library that helps you to generate PDF very easily.</td>
                    </tr>
                    <tr>
                        <td>Generate Bar code</td>
                        <td>php-barcode-generator</td>
                        <td><a href="{{ url('examples/barcode') }}">This example</a> will demonstrate how to generate a bar code in PHP as HTML or image.</td>
                    </tr>
                  </tbody>
                </table>
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>
@endsection

@push('scripts')
<script>
(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
  });
  
  //Generate a random URL to a fake profile picture 
  var intervalID = setInterval(function() {
    var items = Array('m','f');
    var sex = items[Math.floor(Math.random()*items.length)];
    var number = Math.floor(Math.random() * 43) + 1;
    var picturePath = `{{url('images/examples/faces')}}/${sex}${number}.jpg`;
    $("#imgProfilePic").attr("src", picturePath);  
  }, 500);

})(document);
</script>
@endpush
