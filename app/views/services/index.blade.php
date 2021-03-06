@extends('layouts.scaffold')

@section('main')

<h1>All Services</h1>

<p>{{ link_to_route('services.create', 'Add New Service', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($services->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Order</th>
				<th>Size</th>
				<th>Name</th>
				<th>Short Name</th>
				<th>Description</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($services as $service)
				<tr>
					<td class="col-xs-1">{{ $service->order }}</td>
					<td class="col-xs-1">{{ $service->size }}</td>
					<td class="col-xs-2">{{ $service->name }}</td>
					<td class="col-xs-2">{{ $service->shortName }}</td>
					<td class="col-xs-4">{{ $service->description }}</td>
                    <td class="col-xs-2">
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('services.destroy', $service->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('services.edit', 'Edit', array($service->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no services
@endif

@stop
