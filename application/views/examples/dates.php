<!--Include the JS Library MomentJS //-->
<script src="<?php echo base_url();?>assets/js/moment-with-locales-2.19.3.min.js"></script>
<!--The next Include is for the popup,you don't need it for MomentJS //-->
<script src="<?php echo base_url();?>assets/js/bootbox-4.4.0.min.js"></script>
<!--The next two includes are for displaying the code in a nice way //-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/codemirror-5.32.0/lib/codemirror.css">
<script src="<?php echo base_url();?>assets/codemirror-5.32.0/lib/codemirror.js"></script>
<script src="<?php echo base_url();?>assets/codemirror-5.32.0/mode/javascript/javascript.js"></script>
<script src="<?php echo base_url();?>assets/codemirror-5.32.0/addon/selection/active-line.js"></script>

<style>
.console {
  background-color: black;
  color: white;
  font-family: monospace;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  padding-left: 5px;
  height: 100%;
  width: 100%;
}
</style>

<h1>MomentJS is a JS library for dates</h1>
<p>MomentJS allows you to format and perform operation with dates in Javascript. Please visit their website for more information:
  <a target="_blank" href="https://momentjs.com/">https://momentjs.com/</a></p>

<button class="btn btn-primary" onclick="displayDateTenDaysAgo();">
Click me to know what was the date 10 days ago
</button>

<h3 id="format-dates">Format Dates</h3>

<div class="row">
  <div class="col-6">
<textarea id="txtFormat">
moment().format('MMMM Do YYYY, h:mm:ss a');
moment().format('dddd');
moment().format("MMM Do YY");
moment().format('YYYY [escaped] YYYY');
moment().format();
</textarea>
<button id='cmdExecuteFormat' class="btn" onclick="executeJS(codeFormat);">
  <i class="fas fa-play"></i>&nbsp;Execute
</button>
<button id='cmdStopFormat' onclick="stopExecutionJS(codeFormat);" class="btn">
  <i class="fas fa-stop"></i></i>&nbsp;Stop
</button>
  </div>
  <div class="col-6">
    <pre id='spnExecuteFormat' class='console'>Please click on Execute</pre>
  </div>
</div>

<h3 id="relative-time">Relative Time</h3>

<div class="row">
  <div class="col-6">
<textarea id="txtRelative">
moment("20111031", "YYYYMMDD").fromNow();
moment("20120620", "YYYYMMDD").fromNow();
moment().startOf('day').fromNow();
moment().endOf('day').fromNow();
moment().startOf('hour').fromNow();
</textarea>
<button id='cmdExecuteRelative' class="btn" onclick="executeJS(codeRelative);">
  <i class="fas fa-play"></i>&nbsp;Execute
</button>
<button id='cmdStopRelative' onclick="stopExecutionJS(codeRelative);" class="btn">
  <i class="fas fa-stop"></i></i>&nbsp;Stop
</button>
  </div>
  <div class="col-6">
    <pre id='spnExecuteRelative' class='console'>Please click on Execute</pre>
  </div>
</div>

<h3 id="calendar-time">Calendar Time</h3>

<div class="row">
  <div class="col-6">
<textarea id="txtCalendar">
moment().subtract(10, 'days').calendar();
moment().subtract(6, 'days').calendar();
moment().subtract(3, 'days').calendar();
moment().subtract(1, 'days').calendar();
moment().calendar();
moment().add(1, 'days').calendar();
moment().add(3, 'days').calendar();
moment().add(10, 'days').calendar();
</textarea>
<button id='cmdExecuteCalendar' class="btn" onclick="executeJS(codeCalendar);">
  <i class="fas fa-play"></i>&nbsp;Execute
</button>
<button id='cmdStopCalendar' onclick="stopExecutionJS(codeCalendar);" class="btn">
  <i class="fas fa-stop"></i></i>&nbsp;Stop
</button>
  </div>
  <div class="col-6">
    <pre id='spnExecuteCalendar' class='console'>Please click on Execute</pre>
  </div>
</div>

<h3 id="multiple-locale-support">Multiple Locale Support</h3>

<div class="row">
  <div class="col-6">
<textarea id="txtLocales">
moment.locale();
moment().format('LT');
moment().format('LTS');
moment().format('L');
moment().format('l');
moment().format('LL');
moment().format('ll');
moment().format('LLL');
moment().format('lll');
moment().format('LLLL');
moment().format('llll');
</textarea>
<button id='cmdExecuteLocales' class="btn" onclick="executeJS(codeLocales);">
  <i class="fas fa-play"></i>&nbsp;Execute
</button>
<button id='cmdStopLocales' onclick="stopExecutionJS(codeLocales);" class="btn">
  <i class="fas fa-stop"></i></i>&nbsp;Stop
</button>
  </div>
  <div class="col-6">
    <pre id='spnExecuteLocales' class='console'>Please click on Execute</pre>
  </div>
</div>

<!-- Live example of usage //-->
<script type="text/javascript">
var codeFormat = {
  editor: null,
  target: $('#spnExecuteFormat'),
  running: true,
}
var codeRelative = {
  editor: null,
  target: $('#spnExecuteRelative'),
  running: true,
}
var codeLocales = {
  editor: null,
  target: $('#spnExecuteLocales'),
  running: true,
}
var codeCalendar = {
  editor: null,
  target: $('#spnExecuteCalendar'),
  running: true,
}

//Pauses the execution of script so as to get a step by step visual effect
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

//Stop the execution of script
function stopExecutionJS(code) {
  code.running = false;
}

//Eval / Execute Javascript code
async function executeJS(code){
  code.running = true;
  code.target.html('');
  var script = code.editor.doc.getValue();
  var v = script.split(/\n/), res = [];
  for (var i = 0; (i < v.length) && code.running; i++) {
    var line = v[i];
    if (line) {
      var output = '';
      try {
        output = eval(line);
      } catch(e) {
        output = e;
      }
      if (!output) {
        output = '<br />';
      }
      code.target.html(code.target.html() + output + '<br />');
    } else {
      code.target.html(code.target.html() + '<br />');
    }
    code.editor.focus();
    code.editor.setCursor({line: i, ch: 1});
    await sleep(500);
  }
}

$(function() {
  //Configure the codemirror editors so as to display Javascript code
  codeFormat.editor = CodeMirror.fromTextArea(document.getElementById('txtFormat'), {
    mode:  "javascript",
    lineNumbers : true,
    styleActiveLine: true
  });
  codeRelative.editor = CodeMirror.fromTextArea(document.getElementById('txtRelative'), {
    mode:  "javascript",
    lineNumbers : true,
    styleActiveLine: true
  });
  codeCalendar.editor = CodeMirror.fromTextArea(document.getElementById('txtCalendar'), {
    mode:  "javascript",
    lineNumbers : true,
    styleActiveLine: true
  });
  codeLocales.editor = CodeMirror.fromTextArea(document.getElementById('txtLocales'), {
    mode:  "javascript",
    lineNumbers : true,
    styleActiveLine: true
  });
});

//Sample function that displays an alert showing the date 10 days ago
function displayDateTenDaysAgo(){
  moment.locale('en');
  var pastDate = moment().subtract(10, 'days').calendar();
  bootbox.alert("Date 10 days ago: " + pastDate);
}
</script>
