@extends('layouts.app')

@section('content')
<a href="/categories/{{$post->category_id}}">Back To Categories</a>    <hr>
    <h3>{{$post->name}}</h3>
    <p>{{$post->content}}</p>
    
    
    <img src="/storage/files/{{$post->category_id}}/{{$post->file}}" alt="{{$post->name}}">
    <br><br>
    
    
   {{-- @if(file_exists(public_path("/storage/files/{{$post->category_id}}/{{$post->file}}")))
        return 123   
    @else
        return 456
    @endif  --}}
    
  

  
    

    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit post</a><br><br>
   
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::SUBMIT('Delete post', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}

    <hr>

    <h3>Comments:</h3>
    <div style="margin-bottom:50px;">
        <input type="text" name="author" class="form-control", placeholder="Author", v-model='authorBox'>
        <textarea class="form-control" rows="3" name="content" placeholder="Leave a comment" v-model='commentBox'></textarea>
        <button class="btn btn-success" style="margin-top: 10px;" @click.prevent='postComment'>Save Comment</button>
    </div>

    <div class="media" style="margin-top:20;" v-for="comment in comments">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">@{{comment.author}} said ...</h4>
            <p>
                @{{comment.content}}
            </p>
            <span style="color : #aaa;">on @{{comment.created_at}}</span>
        </div>
    </div>

@endsection

@section('scripts')
<script>

    const app = new Vue({
        el: '#app',
        data: {
            comments: {},
            commentBox: '',
            authorBox: '',
            post: {!! $post->toJson() !!},
        },
        mounted(){
            this.getComments();
        }
        methods: {
            getComments(){
                axios.get(`/api/posts/${this.post.id}/comments`)
                .then((response) => {
                    this.comments = response.data
                })
                .catch(function(error){
                   alert(error);      
                });
            },
            postComment(){
                axios.post(`/api/posts/${this.post.id}/comment`, {
                    author: this.authorBox,
                    content: this.commentBox
                })
                .then((response) => {
                    this.comments.unshift(response.data);
                    this.authorBox = '';
                    this.commentBox = '';
                })
                .catch(function (error){
                    alert(error);
                })
            }
        }
    });

</script>    
@endsection


