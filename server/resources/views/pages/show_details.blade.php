<!doctype html>
<html lang="en">

<head>
    <title>Word </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{asset ('public/frontend/word/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- Icon Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	
<body>
    <header>
        <nav class="navbar navbar-dark bg-white navbar-expand-lg d-flex justify-content-around">
            <div class=" col-xs-2 col-lg-3 ">
                <a class="navbar-brand d-none d-sm-none d-md-none d-lg-block float-right" href="{{URL::to('/')}}">
                    <img src="{{ URL::to('public/frontend/detail/img/Logo/Asset 3.png') }}" id="LogoMENU" alt="logo" width="120vw" height="auto">
                </a>
                 <a class="navbar-brand d-xs-block d-md-block d-lg-none" href="{{URL::to('/')}}">
                    <img src="{{ URL::to('public/frontend/Home/img/Logo/Asset 3.png') }}" alt="logo" width="90vw" height="auto">
                </a> 
                
                <div class="float-right Icon_search">
                    <button class="navbar-toggler btn-md pr-2" type="button" data-toggle="collapse" data-target="#navbar-search" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                            <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <button class="navbar-toggler btn-md" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                      <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
    
            <div class="Menu-Onclick col-lg-6">
                <div id="navbar-search" class="collapse">
                <div class=" navbar-collapse d-flex" >
                    <form action="{{ URL::to('/tim-kiem') }}" method="POST">
                        {{ csrf_field() }}
                    <div class="input-group col-8 col-sm-8 col-md-8 col-lg-10 mx-auto pr-0">
                        
                        
                        <input type="text" class="form-control shadow-none" id="Borderblue_input"  name="keywords_submit" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn text-danger" type="submit"  style="font-size: 20px;" type="button">
                               <i class="fa fa-search" style="color: #BE2031"></i>
                            </button>
                        </div>
                    
                    </div>
                </form>
                    <div class="button-add d-lg-none float-right">
                            <a href=""><button type="button" class="btn-sm d-md-block d-lg-none d-sm-block d-block">Add</button></a>
                            </div>
                </div>
                
            </div>
                <div class="collapse navbar-collapse" id="navbar-list-2">
                    <ul class="navbar-nav list-inline d-flex mx-auto justify-content-center">
                        <li class="nav-item active list-inline-item text-danger">
                                <div class="dropdown show">
                                      <a class="btn dropdown-toggle text-danger pr-0 pl-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Browers
                                      </a>
                                      <div class="dropdown-menu pl-4" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">
                                            @foreach ($alphabet_dictionary as $key => $alphabet_nav)
                                            <a href="" class="dropdown-item-1">{{ $alphabet_nav->alphabet_name }}</a>
                                            @endforeach
                                            
                                        
                                        </a>
                                        
                                      </div>
                                </div>
                            
                        </li>
                        <li class="nav-item list-inline-item text-danger">
                                <div class="dropdown show">
                                      <a class="btn dropdown-toggle text-danger pr-0 pl-0" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-graduation-cap"></i>  College</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i class="fas fa-briefcase"></i>  Work</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-utensils"></i>  Food</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i class="fas fa-restroom"></i>  Sex</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-gamepad"></i>  Game</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i class="fab fa-internet-explorer"></i>  Internet</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-home"></i>  Family</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i class="fas fa-church"></i>  Religion</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-swimmer"></i>  Sport</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i class="fas fa-headphones-alt"></i>  Music</a>
                                        </a>
                                      </div>
                                </div>
                        </li>
                        <li class="nav-item list-inline-item text-danger">
                            <a class="nav-link text-danger" href="#">Vote</a>
                        </li>
                        <li class="nav-item-1 list-inline-item text-danger">
                            <a class="nav-link text-danger" href="#">About</a>
                        </li>
                    </ul>
                </div>		
            </div>
                <div class="add col-lg-3 col-xl-3">
                     <a href="#" data-toggle="tooltip" title="Please add your words!">
                         <button type="button" class="btn btn-outline-danger d-md-none d-lg-block d-sm-none d-none ">ADD</button>
                    </a>
                </div>
        </nav>
    </header>
<head>
    <title>Detail </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<link rel="stylesheet" href="styledetail.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- Icon Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <div class="container-fluid" style="height:auto;">
    <div class="row" style="height:auto;">
            <div class="main-page col-12 col-md-12 col-lg-12"  style="height:auto;">
                <div class="thong-tin col-10 col-md-10 col-lg-8 mx-auto mb-5" style=" height:auto">
                    @foreach($details_dictionary as $key => $dictionary)
                    <h1 style="width: 100%"><b>English:</b>{{$dictionary->dictionary_name_eng}}</h1>
                    <br>
                    <p style="width: 100%" ><b>Vietnamese: </b> {{$dictionary->dictionary_name_vn}}</p>
                    <p> <b>Description: </b> {!! $dictionary->dictionary_desc !!} </p>
                    <img src="{{ URL::to('public/uploads/dictionary/'.$dictionary->dictionary_image) }}" class="shadow   bg-white rounded" style="width: 40%;" alt="">
                    <p style="width: 100%"><b>Alphabet: </b>{{$dictionary->alphabet_name}}        </p>
                    <p style="width: 100%"><b>Word Type: </b>{{$dictionary->wordtype_name}}</p>
                  
                    @endforeach
                    <h2>Từ Liên quan.</h2>
                   
                        <div class=" col-12 col-md-12 col-lg-12 mx-auto d-flex flex-wrap align-content-center  justify-content-between" >
                            @foreach($relate as $key => $lienquan)
                            <a href="{{URL::to('/chi-tiet-tu-dien/'.$lienquan->dictionary_id)}}">
                            <div class="col-sm-3 shadow  p-3 bg-white rounded" >
                            <p>{{ $lienquan->dictionary_name_eng }}</p>
                           
                            <img src="{{ URL::to('/public/uploads/dictionary/'.$lienquan->dictionary_image) }}" alt="" style="width:80%"/>
                            </a>
                        </div>
                        @endforeach  
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
	<!-- ====================================================================================================================================footer -->
	<footer class="col-xs-12 col-12 col-md-12 col-lg-12">
           <div class="logo col-10 col-md-10 col-lg-8 mx-auto pt-3 pl-0"><a href="index.html"><img src="{{ ('public/frontend/Home/img/Logo/Asset 4.png') }}" alt=""></a></div>
           <div class="info col-10 col-md-10 col-lg-6 mx-auto d-lg-flex d-md-flex d-sm-flex justify-content-between pt-3">
               <p>Contact Us</p>
               <p>Help</p>
               <p>About</p>
               <p>Contact Us</p>
               <p>Contact Us</p>
               <p>Contact Us</p>
           </div>
			<div class="icon col-lg-6 mx-auto d-lg-flex justify-content-end">
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
			</div>
    </footer>
</body>
	<script>
		$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</html>
