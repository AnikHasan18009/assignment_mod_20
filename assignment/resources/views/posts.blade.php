@extends('app')
@section('title')
news
@endsection
@section('content')
<div class="text-center container-fluid-lg bg-light min-vh-100 p-4">
  <div class="row">
    <h2 class="pb-2 mb-4 text-light border-bottom border-light">Latest News</h2>
    @forelse ($posts as $post)
        <div class="col-md-4 p-1 my-1 rounded rounded-5">
          <div class="card bg-dark text-light w-100 shadow-lg ">
            <img src='{{asset("images/".$post->image_path)}}' class="card-img-top" alt="image missing">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">
                @php
                    $d=empty($post->created_at)? "None" : date('F d, Y', strtotime($post->created_at));
                @endphp
                    Published: {{$d}}
              </h6>
              <p class="card-text">{{$post->excerpt}}</p>
              <a href='{{route('posts',$post->id)}}' class="btn btn-light">Read More</a>
            </div>
          </div>
        </div>
    @empty
     <div class="col-12 p-5 bg-dark text-light my-3 rounded-pill shadow-lg">No posts found</div>   
    @endforelse
  </div>
</div> 
<div id="test"></div>
<script>
  let x=document.getElementById('test');
  fetch('/posts')
  .then(res=> res.json())
  .then(res=>{
    res.forEach(post => {
      x.innerHTML+=`
      ${post.title}<br\>`;
    });
  }
  )
  .catch(error => alert(error))
  
</script>
@endsection


