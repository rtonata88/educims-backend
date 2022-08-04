@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Module Paper Subminimum' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('module_paper_subminimums.module_paper_subminimum.index') }}" class="btn btn-primary" title="Show All Module Paper Subminimum">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('module_paper_subminimums.module_paper_subminimum.create') }}" class="btn btn-success" title="Create New Module Paper Subminimum">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('module_paper_subminimums.module_paper_subminimum.update', $modulePaperSubminimum->id) }}" id="edit_module_paper_subminimum_form" name="edit_module_paper_subminimum_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('module_paper_subminimums.form', [
                                        'modulePaperSubminimum' => $modulePaperSubminimum,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection