@extends('layouts.layout')

@section('title',$article->title)

@section('content')

    <card header="{{$article->title}}">

        <div class="card-body">

            {{$article->content}}

        </div>
    </card>


            <!-- The edit link -->

    @auth
        @can('update',$article)

            <div class="container">
                <div class="row justify-content-center">

                    <a href= {{route('article.edit',$article)}}>
                        <my-button text="EDIT"></my-button>
                    </a>



                    <!-- The delete action -->

                    <form method="POST" action="/article/{{ $article->id }}">

                        @csrf

                        @method('DELETE')

                        <my-button text="DELETE"></my-button>

                    </form>

                </div>
            </div>

        @endcan
    @endauth



    {{--show comments--}}


    <card header="Comments">

        @foreach($article->comments as $comment)

            <div class="card-body border">

                {{$comment->content}}

            </div>

        @endforeach





    {{-- Add comments form --}}

            @auth

                <form method="POST" action="/article/{{$article->id}}/comment">

                @csrf

                    <div class="card-body border">

                        <input style="text-align: start; height:50px;" id="comment" type="text" class="form-control" name="comment" placeholder="type your comment" value="{{ old('comment') }}" required>

                        <my-button text="ADD"></my-button>

                    </div>

                </form>

            @endauth

    </card>

@endsection
