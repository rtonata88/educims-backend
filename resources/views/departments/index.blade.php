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
                <h4 class="mt-5 mb-5">Departments</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('departments.department.create') }}" class="btn btn-success" title="Create New Department">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($departments) == 0)
            <div class="panel-body text-center">
                <h4>No Departments Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Department Code</th>
                            <th>Department Name</th>
                            <th>Faculty</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->department_code }}</td>
                            <td>{{ $department->department_name }}</td>
                            <td>{{ optional($department->faculty)->faculty_code }}</td>
                            <td>{{ ($department->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('departments.department.destroy', $department->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('departments.department.show', $department->id ) }}" class="btn btn-info" title="Show Department">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('departments.department.edit', $department->id ) }}" class="btn btn-primary" title="Edit Department">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Department" onclick="return confirm(&quot;Click Ok to delete Department.&quot;)">
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
            {!! $departments->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection