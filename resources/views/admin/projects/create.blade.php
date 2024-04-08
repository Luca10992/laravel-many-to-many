@extends('layouts.app')
@section('title', '| Add Project')

@section('content')
  
<div class="container">
    <h1 class="fs-2 fw-bold py-4">Aggiungi progetto</h1>
    <form class="d-flex flex-column gap-3" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-8">
                <label for="title">Nome Progetto</label>
                <input class="form-control @error ('title') is-invalid @enderror" type="text" name="title" id="title">
                @error ('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="type_id">Tipologia Progetto</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option class="d-none" selected="">Seleziona la tipologia</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="thumb">Anteprima Progetto</label>
            <input class="form-control" type="file" name="thumb" id="thumb">
        </div>
        <div>
            <label for="description">Descrizione Progetto</label>
            <textarea class="form-control" type="text" name="description" id="description" rows="4"></textarea>
        </div>
        <div>
            <button class="btn btn-success">Add Project</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>

@endsection