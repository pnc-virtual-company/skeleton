<h1>Examples guide</h1>

<h2>Sending emails with a fake SMTPserver</h2>

<p>Please note that a fake SMTP server (Java/JAR application) is bundled with the skeleton in <code>tests/fakeSMTP-2.0.jar</code></p>

<p>In order to use it:</p>

<ol>
  <li>Double click on the JAR file.</li>
  <li>Click on the button <code>Start server</code>.</li>
  <li>Send an email form the application.</li>
  <li>Double click on an email in the list of emails received by the fake SMTP server.</li>
</ol>

<p><img class="img-fluid" src="<?php echo base_url();?>assets/images/examples/fake-smtp-server.png" /></p>

<h2>Matrix of widgets and libraries</h2>

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
      <td><a href="<?php echo base_url();?>users">List of users</a>, click on <code>export this list</code></td>
    </tr>
    <tr>
      <td>Login form</td>
      <td>Bootstrap + JQuery</td>
      <td>Try to access to the list of users while logged out or to the <a href="<?php echo base_url();?>connection/login">login page</a></td>
    </tr>
    <tr>
      <td>Send an email</td>
      <td>CodeIgniter email library</td>
      <td><a href="<?php echo base_url();?>users/create">Create a new user</a> or reset a password from the users list</td>
    </tr>
    <tr>
      <td>Translate the application</td>
      <td>CodeIgniter i18n library</td>
      <td><a href="<?php echo base_url();?>examples/i18n">examples / Translation</a></td>
    </tr>
    <tr>
      <td>List/Manage data using a table</td>
      <td>JQuery DataTable</td>
      <td><a href="<?php echo base_url();?>users">List of users</a></td>
    </tr>
    <tr>
      <td>Create charts</td>
      <td><a href="<?php echo base_url();?>examples/views/charts">ChartJS</a></td>
      <td>Create beautiful bar charts, line charts or pie charts on the frontend</td>
    </tr>
    <tr>
      <td>Change default font</td>
      <td>Google noto font</td>
      <td>
        We can use many fonts (that you can download for free on the Internet).
        But we prefer you to use <a href="<?php echo base_url();?>examples/views/noto">Google noto</a>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>



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
