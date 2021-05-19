
    <!DOCTYPE html>  
    <html>  
    <head>  
        <title>form validation</title>  
        <meta charset="utf-8" />  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>   
       <script type="text/javascript">  
            (function () {  
                'use strict';  
                window.addEventListener('load', function () {  
                    var form = document.getElementById('needs-validation');  
                    form.addEventListener('submit', function (event) {  
                        if (form.checkValidity() === false) {  
                            event.preventDefault();  
                            event.stopPropagation();  
                        }  
                        form.classList.add('was-validated');  
                    }, false);  
                }, false);  
            })();  
        </script>  
    </head>  
    <body>  
        <div class="container py-5">  
        <header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="/">Add details</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
</header>
            <div class="row">  
                <div class="offset-md-2 col-md-8 offset-md-2">  
                    <div class="card">  
                        <div class="card-header bg-primary text-white">  
                            <h4 class="card-title text-uppercase">Details</h4>  
                        </div>  
                        <div class="card-body">  
                        <table style="width:100%">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                            @forelse($data as $d)
                            <tr>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->mobile}}</td>
                                <td>{{$d->file_name}}</td>
                                <td><a href="delete/{{$d->id }}" class=""><b>Delete</b></a></td>
                            </tr>
                            @empty
                            <tr><td colspan='5' class="text-center">
                                No Record Found
                            </td></tr>
                            @endforelse
                           
                        </table> 
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </body>  
    </html>  
