<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>THINGS TO DO</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <style>
  .custom-checkbox{
    background-color: #DD4F43;
    color:white;
  }
  .custom-checkbox:hover{
    background-color: #AC2B20;
    color:white;
  }
  .custom-checkbox-done{
    background-color: #87C540;
    color:white;
    box-shadow: 0 0 0 0.2rem rgba(170, 215, 121, 0.5);
  }
  .box-margin{
    padding: 5px, 5px, 5px, 5px;
  }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="jumbotron">
    <h1 class="display-4" style="text-align:center;">Things To Do!</h1>
    <p class="lead" style="text-align:center;">This is a simple check list of the things that you need to do.</p>
    <hr class="my-4">
    <div class="container" style="width:60%;">
      <!-- <p class="lead" style="text-align:center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
      <div class="row">
        <div class="col-md-6 box-margin">
          <div class="input-group ">
            <div class="btn-group-toggle" data-toggle="buttons">
              <label class="btn custom-checkbox">
                <input type="checkbox" checked autocomplete="off"> Activity
                <p class="lead" style="margin-left:10px;">Redirect If Session Not Set</p>
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group box-margin">
            <div class="btn-group-toggle" data-toggle="buttons">
              <label class="btn custom-checkbox">
                <input type="checkbox" checked autocomplete="off"> Activity
                <p class="lead" style="margin-left:10px;">transfer stocks selections and overall csv generation</p>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="input-group box-margin">
            <div class="btn-group-toggle" data-toggle="buttons">
              <label class="btn custom-checkbox">
                <input type="checkbox" checked autocomplete="off"> Activity
                <p class="lead" style="margin-left:10px;">Fix Mio Responsiveness</p>
              </label>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="input-group box-margin">
            <div class="btn-group-toggle" data-toggle="buttons">
              <label class="btn custom-checkbox">
                <input type="checkbox" checked autocomplete="off"> Activity
                <p class="lead" style="margin-left:10px;">template</p>
              </label>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

</body>
</html>
