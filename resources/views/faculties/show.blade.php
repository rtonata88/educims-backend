@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Faculty' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('faculties.faculty.destroy', $faculty->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('faculties.faculty.index') }}" class="btn btn-primary" title="Show All Faculty">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('faculties.faculty.create') }}" class="btn btn-success" title="Create New Faculty">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('faculties.faculty.edit', $faculty->id ) }}" class="btn btn-primary" title="Edit Faculty">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Faculty" onclick="return confirm(&quot;Click Ok to delete Faculty.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Faculty Code</dt>
            <dd>{{ $faculty->faculty_code }}</dd>
            <dt>Faculty Name</dt>
            <dd>{{ $faculty->faculty_name }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($faculty->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection