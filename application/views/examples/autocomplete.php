<link rel="stylesheet" href="<?php echo base_url();?>assets/css/typeaheadjs.css">
<script src="<?php echo base_url();?>assets/typeahead.js-0.11.1/typeahead.jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/typeahead.js-0.11.1/bloodhound.min.js"></script>


<h1>Typeahead (autocomplete fields)</h1>

<p>
  We saw how to do achieve a similar result with a SELECT control and Select2.
  In this page, we can see how to achieve an autocomplete feature with local data or with data from the server.
</p>

<h2>Example with a local source</h2>
<label class="demo-label">
  Search for a country:
  <input type="text" id="txtCountry" class="typeahead" />
</label>

<script type="text/javascript">
    $(document).ready(function () {
      var countries = ["Afghanistan", "Albania", "Bahamas", "Bahrain", "Cambodia", "Cameroon", "Denmark", "Djibouti", "East Timor", "Ecuador", "Falkland Islands (Malvinas)", "Faroe Islands", "France", "Gabon", "Gambia", "Haiti", "Heard and Mc Donald Islands", "Iceland", "India", "Jamaica", "Japan", "Kenya", "Kiribati", "Lao People's Democratic Republic", "Latvia", "Macau", "Macedonia", "Namibia", "Nauru", "Oman", "Pakistan", "Palau", "Qatar", "Reunion", "Romania", "Saint Kitts and Nevis", "Saint Lucia", "Taiwan", "Tajikistan", "Uganda", "Ukraine", "Vanuatu", "Vatican City State", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zaire", "Zambia"];

  		var countries_suggestion = new Bloodhound({
  			datumTokenizer: Bloodhound.tokenizers.whitespace,
  			queryTokenizer: Bloodhound.tokenizers.whitespace,
  			local: countries
  		});

  		$('#txtCountry').typeahead(
  			{ minLength: 1 },
  			{ source: countries_suggestion }
  		);
    });
</script>


<h2>Example with a remote source</h2>

<label class="demo-label">
  Search for a file into the PHP Project:
  <input type="text" id="txtFile" class="typeahead" />
</label>

<script type="text/javascript">
$(document).ready(function () {
  var listOfFiles = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
      url: '<?php echo base_url();?>examples/backend/typeahead/files/%QUERY',
      wildcard: '%QUERY'
    }
  });

  $('#txtFile').typeahead(null, {
    name: 'files',
    source: listOfFiles
  });
});
</script>
