
window._ = require('lodash');
window.Popper = require('popper.js').default;
window.moment = require('moment');
require('tinymce');
require('chart.js');
require('awesomplete');
require('js-cookie');
const flatpickr = require("flatpickr");

window.CodeMirror = require('codemirror');
require('codemirror/mode/javascript/javascript');
require('codemirror/addon/selection/active-line');

window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('croppie');
require('jstree');
require('fullcalendar');
require('fullcalendar/dist/locale-all.js');
require('datatables.net');
require('datatables.net-bs4');
//require('datatables.net-autofill');
//require('datatables.net-autofill-bs4');
require('datatables.net-buttons');
require('datatables.net-buttons-bs4');
require('datatables.net-buttons/js/buttons.colVis.js');
require('datatables.net-colreorder');
require('datatables.net-colreorder-bs4');
require('datatables.net-fixedcolumns');
require('datatables.net-fixedcolumns-bs4');
//require('datatables.net-fixedheader');
//require('datatables.net-keytable');
require('datatables.net-responsive');
require('datatables.net-responsive-bs4');
//require('datatables.net-rowgroup');
//require('datatables.net-scroller');
require('datatables.net-select');
/*
Extra dependencies for DataTable buttons plugin:
    require( 'datatables.net-buttons/js/buttons.colVis.js' )();
    require( 'datatables.net-buttons/js/buttons.html5.js' )();
    require( 'datatables.net-buttons/js/buttons.flash.js' )();
    require( 'datatables.net-buttons/js/buttons.print.js' )();
*/

//JQuery Plugins or libs using JQuery
require('bootstrap-datepicker');
require('select2');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
