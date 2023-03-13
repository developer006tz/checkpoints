<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excel upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
<nav class="navbar bg-info">
  <div class="container">
    <a href="{{ route('dashboard') }}" class="text-white fw-bolder">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        {{__('IGS AFRICA')}}
                    </a>
    
  </div>
</nav>
<div class="container-fluid bg-dark" style="height: 90vh;">
  <div class="row">
    <div class="col-md-10 my-3 m-auto">
      <div class="card">
        <div class="card-header">
          <h3>Excel Upload
            <a href="{{ route('station.getsample') }}" class="btn btn-sm btn-warning add-btn">Download_sample</a>
          </h3>
          @if (session('success'))
       <div class="alert alert-success" role="alert">
        {{ session('success') }}y
            </div>
        @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            


        </div>
        <div class="card-body">
          <form action="{{ route('station.uploadByExcel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="file" name="file" class="form-control bg-warning bg-opacity-25"  id="file" required>
            </div>
            <button type="submit" class="btn btn-primary my-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>