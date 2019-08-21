@extends('layouts.layout')

@section('title','Create Article')

@section('content')
    <card header="Edit Your Article">

        <div class="card-body">


            <!-- The edit form -->

            <form method="POST" action="/article/{{ $article->id }}">

                @csrf

                @method('PATCH')

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title }}" required autocomplete="title">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">content</label>

                    <div class="col-md-6">
                        <textarea rows="15" cols="15" id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="content" minlength="10">{{ $article->content }}</textarea>

                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <my-button text="EDIT"></my-button>
                    </div>
                </div>

            </form>

        </div>

    </card>

@endsection