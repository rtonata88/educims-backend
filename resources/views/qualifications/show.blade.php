@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Qualification' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('qualifications.qualification.destroy', $qualification->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('qualifications.qualification.index') }}" class="btn btn-primary" title="Show All Qualification">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('qualifications.qualification.create') }}" class="btn btn-success" title="Create New Qualification">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('qualifications.qualification.edit', $qualification->id ) }}" class="btn btn-primary" title="Edit Qualification">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Qualification" onclick="return confirm(&quot;Click Ok to delete Qualification.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Qualification Code</dt>
            <dd>{{ $qualification->qualification_code }}</dd>
            <dt>Qualification Name</dt>
            <dd>{{ $qualification->qualification_name }}</dd>
            <dt>Number Of Years</dt>
            <dd>{{ $qualification->number_of_years }}</dd>
            <dt>Department Code</dt>
            <dd>{{ $qualification->department_code }}</dd>
            <dt>Qualification Type</dt>
            <dd>{{ optional($qualification->qualificationType)->id }}</dd>
            <dt>Qualification Level</dt>
            <dd>{{ $qualification->qualification_level }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($qualification->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection