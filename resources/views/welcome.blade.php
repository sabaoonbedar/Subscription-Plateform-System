
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Subscription System</title>




    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Favicons -->

<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
  </head>
  <body>

<main>


    @if(session()->has('message'))

    <div class="" id="successalert">
    <div class="alert alert-success" id="successalert">


      {{ session()->get('message') }}


      <span class="" style="color:black; font-size=12px" onclick="this.parentElement.style.display='none';">&times;</span>

    </div>
    </div>
    @endif



   @if ($errors->any())

       <div class="alert" id="alertb">


           <div class="alert alert-danger" id="alert" ><strong>OOPS!</strong>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>

           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul></div>

       </div>
   @endif








<div class="row p-4 ">
  <h2 class="visually-hidden">Subscription System</h2> &nbsp;&nbsp;

  <button type="button" class="btn btn-info btn-sm px-4 gap-3"
        id="website"

        data-toggle="modal"
         data-target="#websiteModal"

          >Create a Website</button>
</div>


  @foreach($list as $list)
  <div class="px-4 py-2 my-4 text-center  ">
      <div class="card p-4 ">
    <h1 class="display-5 fw-bold">{{$list->name}}</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Subscribe or post on a website</p>


      <div class="d-grid gap-5 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-sm px-4 gap-6"
        id="subscribe"

        data-toggle="modal"
         data-target="#exampleModal"
          data-id={{$list->id}}
          data-name="{{$list->name}}"



          >Subscribe</button>


           &nbsp;



        <a type="button" class="btn btn-outline-secondary btn-sm px-4 gap-6" href={{route('create.post',$list->id)}}>Post</a>
      </div>
    </div>
      </div>
  </div>

  <div class="b-example-divider"></div>
@endforeach


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subscribe to <span id="info"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" id="form" class="form" action="{{ route('create.subscriber') }}">
                @csrf

            <input id="id" name="website_id" hidden value="">


            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <button type="submit"  class="btn btn-warning">Subscribe</button>

          </form>

        </div>

      </div>
    </div>
  </div>









<!--Website Modal -->
<div class="modal fade" id="websiteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create a website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" id="form" class="form" action="{{ route('create.website') }}">
                @csrf

            {{-- <input id="id" name="website_id" hidden value=""> --}}


            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Website Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Website Name" required>
            </div>

            <button type="submit"  class="btn btn-info">Create</button>

          </form>

        </div>

      </div>
    </div>
  </div>








</main>


<script>

    $(document).on('click','#subscribe',function(){
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        // let flag = $(this).attr('data-flag');

        console.log(name);

        $('#info').text(name);

        // console.log(id);
        $('#id').val(id);
   });
</script>

  </body>
</html>
