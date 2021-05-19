
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
            <a class="nav-link" aria-current="page" href="/view-details">View details</a>
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
                            <h4 class="card-title text-uppercase">Details Form</h4>  
                        </div>  
                        <div class="card-body">  
                        @if ($errors->any())
                <div class="alert alert-danger" id="verr">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                            <form id="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ url('save-details') }}" autocomplete="off">  
                            @csrf
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="form-group">  
                                            <label for="firstname">Name</label>  
                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" aria-describedby="inputGroupPrepend" required />  
                                            <div class="invalid-feedback">  
                                                Please enter first name.  
                                            </div>  
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="form-group">  
                                            <label for="email">Email address</label>  
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" aria-describedby="inputGroupPrepend" required>  
                                            <div class="invalid-feedback">  
                                                Please provide a valid email.  
                                            </div>  
                                        </div>  
                                    </div>  
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="form-group">  
                                            <label for="phonenumber">Mobile Number</label>  
                                            <input type="tel" pattern="^\d{10}$" name="mobile" class="form-control" id="phonenumber" placeholder="Mobile Number" aria-describedby="inputGroupPrepend" required>  
                                            <div class="invalid-feedback">  
                                                Please enter 10 digit mobile number.  
                                            </div>  
                                        </div>  
                                    </div>  
                                </div>  
                                
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="form-group">  
                                            <label>Upload File</label>  
                                            <div class="custom-file">  
                                                <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>  
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>  
                                                <div class="invalid-feedback">Choose file for upload</div>  
                                            </div>  
                                        </div>                                  
                                    </div>  
                                </div>  
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="float-right">  
                                            <!-- <button class="btn btn-danger rounded-0" type="submit">Cancel</button>   -->
                                            <button class="btn btn-primary rounded-0" type="submit" value="Add">Add</button>  
                                        </div>                            
                                    </div>  
                                </div>  
                            </form>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </body>  
    </html>  
