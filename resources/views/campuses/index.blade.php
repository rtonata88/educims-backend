@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Campuses</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('campuses.campus.create') }}" class="btn btn-success" title="Create New Campus">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($campuses) == 0)
            <div class="panel-body text-center">
                <h4>No Campuses Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Campus Name</th>
                            <th>Postal Address</th>
                            <th>Physical Address</th>
                            <th>Contact Number</th>
                            <th>Contact Person</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($campuses as $campus)
                        <tr>
                            <td>{{ $campus->campus_name }}</td>
                            <td>{{ $campus->postal_address }}</td>
                            <td>{{ $campus->physical_address }}</td>
                            <td>{{ $campus->contact_number }}</td>
                            <td>{{ $campus->contact_person }}</td>
                            <td>{{ ($campus->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('campuses.campus.destroy', $campus->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('campuses.campus.show', $campus->id ) }}" class="btn btn-info" title="Show Campus">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('campuses.campus.edit', $campus->id ) }}" class="btn btn-primary" title="Edit Campus">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Campus" onclick="return confirm(&quot;Click Ok to delete Campus.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $campuses->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection