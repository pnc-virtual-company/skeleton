@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            
            <div class="row-fluid">
                <div class="col-12">
                  <h1>JsTree is a JQuery Widget</h1>
              
                  <p>You can find more information on the <a href="https://www.jstree.com/" target="_blank">official website</a>.</p>
              
                  <p>Below are two examples:</p>
                  <ul>
                    <li>With static data</li>
                    <li>With dynamic data</li>
                  </ul>
                </div>
              </div>
              
              <div class="row">
                <div class="col-6">
                  <h3>static</h3>
                  <div id="jstree1">
                    <ul>
                      <li>Root node 1
                        <ul>
                          <li>Child node 1</li>
                          <li><a href="#">Child node 2</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-6">
                  <h3>dynamic</h3>
                  <div id="jstree2"></div>
                </div>
              </div>
              
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#jstree1').jstree();
    $('#jstree2').jstree({'plugins':["wholerow","checkbox"], 'core' : {
        'data' : [
        {
            "text" : "Same but with checkboxes",
            "children" : [
            { "text" : "initially selected", "state" : { "selected" : true } },
            { "text" : "custom icon URL", "icon" : "//jstree.com/tree-icon.png" },
            { "text" : "initially open", "state" : { "opened" : true }, "children" : [ "Another node" ] },
            { "text" : "custom icon class", "icon" : "glyphicon glyphicon-leaf" }
            ]
        },
        "And wholerow selection"
        ]
    }});
});
</script>
@endpush
