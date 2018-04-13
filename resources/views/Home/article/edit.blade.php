@extends('Home.layout.man')
@section('title', '文章编辑页')
@section('content')
    <div class="col-sm-8 blog-main">
        <form action="/posts/{{$post->id}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label>内容</label>
                <div id="editor" style="height:400px;max-height:500px;">{!! $post->content !!}</div>
                <textarea id="content" style="height:400px;max-height:500px;display: none"name="content" class="form-control" placeholder="这里是内容"></textarea>
            </div>
            @include('Home.layout.error')
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>
    </div><!-- /.blog-main -->
@endsection
@section('js')
    <script src="{{asset('js/ylaravel.js')}}"></script>
@endsection