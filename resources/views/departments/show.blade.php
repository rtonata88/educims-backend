@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Department' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('departments.department.destroy', $department->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('departments.department.index') }}" class="btn btn-primary" title="Show All Department">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('departments.department.create') }}" class="btn btn-success" title="Create New Department">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('departments.department.edit', $department->id ) }}" class="btn btn-primary" title="Edit Department">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Department" onclick="return confirm(&quot;Click Ok to delete Department.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Department Code</dt>
            <dd>{{ $department->department_code }}</dd>
            <dt>Department Name</dt>
            <dd>{{ $department->department_name }}</dd>
            <dt>Faculty</dt>
            <dd>{{ optional($department->faculty)->faculty_code }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($department->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection