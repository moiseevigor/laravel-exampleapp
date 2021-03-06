@extends('app')

@section('css')
	<link href="{{ asset('/css/vendor.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/formbuilder.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Order N{{ $order->id }} by {{ $order->user->name }} on {{ $form->name }}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ action('OrderController@update', ['formId' => $form->id, 'orderId' => $order->id]) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						@foreach ($order_fields as $field)
							<div class="form-group">
								<label class="col-md-4 control-label">{{ $field->label }}</label>
								<div class="col-md-6 response-field-text">
									{!! $field->html !!}
								</div>
							</div>
						@endforeach

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('js')
	<script type='text/javascript'>
	// https://github.com/biggora/bootstrap-ajax-typeahead#ajax
	$(document).ready(function() {
		$('.cap').typeahead({
			ajax: {
				url: '/cap/search',
				displayField: "full_name",
				triggerLength: 1,
        		method: "get"
        	}
		});
	})
	</script>
@endsection
