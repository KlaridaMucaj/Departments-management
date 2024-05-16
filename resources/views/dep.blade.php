<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\tree.css">
</head>
<body>
	<div class="container">     
    <a href="/home"  class="btn btn-primary float-left btn-success">Home</a>
		<div class="panel panel-primary">
			<div class="panel-heading">Departament List</div>
	  		<div class="panel-body">
	  			<div class="row">
	  				<div class="col-md-6 tree">
                      <ul id="tree1">
	            
@foreach($departaments as $departament)
<li>
<x-departament-item :departament="$departament"/>
</li>
@endforeach	
				        
				        </ul>
	  				</div>
                                <div class="col-md-6">
	  					<h3>Add New Departament</h3>


				  			{!! Form::open(['route'=>'add']) !!}


				  				@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
									        <strong>{{ $message }}</strong>
									</div>
								@endif


				  				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									{!! Form::label('name:') !!}
									{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
									<span class="text-danger">{{ $errors->first('name') }}</span>
								</div>


								<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
									{!! Form::label('Departament:') !!}
									{!! Form::select('parent_id',$allDepartaments, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Departament Parent']) !!}
									<span class="text-danger">{{ $errors->first('parent_id') }}</span>
								</div>


								<div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>
                              
				  			{!! Form::close() !!}
                                </div>
	  			</div>	  			
	  		</div>
        </div>
    </div>
    <!-- <script>
        $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();
</script> -->
</body>
</html>