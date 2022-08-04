@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Qualification Type' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('qualification_types.qualification_type.destroy', $qualificationType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('qualification_types.qualification_type.index') }}" class="btn btn-primary" title="Show All Qualification Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('qualification_types.qualification_type.create') }}" class="btn btn-success" title="Create New Qualification Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('qualification_types.qualification_type.edit', $qualificationType->id ) }}" class="btn btn-primary" title="Edit Qualification Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Qualification Type" onclick="return confirm(&quot;Click Ok to delete Qualification Type.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Qualification Type</dt>
            <dd>{{ $qualificationType->qualification_type }}</dd>

        </dl>

    </div>
</div>

@endsection