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
                      <td><a href="{{ url('users') }}users">List of users</a>, click on <code>export this list</code></td>
                    </tr>
                    <tr>
                      <td>Login form</td>
                      <td>Bootstrap + JQuery</td>
                      <td>Try to access to the list of users while logged out or to the <a href="{{ url('login') }}">login page</a></td>
                    </tr>
                    <tr>
                      <td>Send an email</td>
                      <td>Laravel email library</td>
                      <td><a href="{{ url('examples/emails') }}">Send an email</a> and test with a Fake SMTP server.</td>
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
                      <td></td>
                      <td></td>
                      <td></td>
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

})(document);
</script>
@endpush
