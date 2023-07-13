@extends('app')
@section('title')
news
@endsection
@section('content')
<div class=" mt-5 text-center container-fluid-lg bg-light min-vh-100 p-4">
  <div class="row justify-content-center bg-dark text-light p-4">
   @if(!empty($post))
        <div class="col-11 p-1 my-1 rounded-3">
          <div class="card bg-dark text-light w-100 shadow-lg ">
            <div class="h-75">
            <img src='{{asset("images/".$post->image_path)}}' class="card-img-top" alt="image missing" style="
              height: 80vh;
              object-fit: cover;">
          </div>
            <div class="card-body">
              <h1 class="card-title">{{$post->title}}</h1>
              <h4 class="card-subtitle mb-2 text-muted">
                @php
                    $d=empty($post->created_at)? "None" : date('F d, Y', strtotime($post->created_at));
                @endphp
                    Published: {{$d}} &nbsp &nbsp
               
              </h4>
              <p class="card-text fs-4 fw-bold">{{$post->excerpt}}</p>
              <p class="card-text fs-4">{{$post->description}}</p>
            </div>
          </div>
        </div>
    @else
     <div class="col-12 p-5 bg-dark text-light my-5 rounded-pill shadow-lg">No posts found</div>   
    @endif
    <div id="comments" class="col-11 my-3 w-50 rounded-3">
     
    </div>
    <div id="add-comment" claas="col-11 p-3 rounded-3">
      @csrf
      <form id="form" method="POST">
        <div class="mb-3 w-50 mx-auto">
          <label for="comment" class="form-label fs-3">Add a Comment</label>
          <textarea class="form-control fs-4" id="comment" rows="3"></textarea>
          <input type="hidden" value="{{$post->id}}" id="post_id" >
        </div>
        <button type="submit" class="btn btn-primary fs-4" >Add</button>
      </form>
    </div>
  </div>
</div> 
<script>
  
  
  let form=document.getElementById('form')
  
  let id=document.getElementById('post_id').value
  getComments();
form.addEventListener('submit', function(e){
e.preventDefault();
 let comment=document.getElementById('comment').value
if(comment.length===0){
  alert("Please enter a valid comment")
}
else{
  let URL="/post/"+id+"/comment/create";
 fetch(URL, {
  method: 'POST',
  body: JSON.stringify({
    content:comment
  }),
  headers: {
    'Content-type': 'application/json; charset=UTF-8',
  }
  })
  .then((reponse)=>
  { 
  if(reponse.ok)
  {
    alert('added commnet');
    document.getElementById('comment').value="";
    getLatestComment();
  }
})
  .catch(error => alert('Error:', error)); 
}
});
  

  function getComments()
  {

    
    let URL="/posts/"+id+"/comments";
 fetch(URL)
  .then((response)=> response.json())
  .then((data)=>
  {
    if(data.length!==0)
    {
      const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      comment_section=document.getElementById('comments')
      data.forEach(comment=>{
      const d = new Date(comment['created_at']);
             month=months[d.getMonth()];
             year=d.getFullYear();date=d.getDate();
             date+=" "+month+", "+year;
      comment_section.innerHTML+=`
      <div class="bg-light text-dark mb-4  mx-auto rounded-3 d-flex justify-content-center align-items-center p-2">
           <p class="t p-2 me-auto " style="width:80%; text-align:justify ">${comment['content']}</p>
           <div class="fst-italic fsw-lighter text-start flex-grow-1 p-2"><small>${date}</small></div>
      </div>
      `
    }
      )

    }
  })
  .catch(error => alert(error)); 
}

 
function getLatestComment()
  {

    let URL="/posts/"+id+"/latest-comment";
 fetch(URL)
  .then((response)=> response.json())
  .then((comment)=>
  {
    if(Object.values(comment).length !== 0)
    {
      const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      comment_section=document.getElementById('comments')
      const d = new Date(comment['created_at']);
      month=months[d.getMonth()];
      year=d.getFullYear();date=d.getDate();
      date+=" "+month+", "+year;
      comment_section.innerHTML+=`
      <div class="bg-light text-dark mb-4  mx-auto rounded-3 d-flex justify-content-center align-items-center p-2">
           <p class="t p-2 me-auto " style="width:80%; text-align:justify ">${comment['content']}</p>
           <div class="fst-italic fsw-lighter text-start flex-grow-1 p-2"><small>${date}</small></div>
      </div>
      `

    }
  })
  .catch(error => alert(error)); 
}   
  
</script>
@endsection


