
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Make ur trip</title>
    <link rel="stylesheet" href="./assets/css/makeOrder.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


      <div class="container" >
        <div class="row d-flex justify-content-center align-items-center" style="margin-top:9rem">
          <div class="col-md-8">
              <form action="{{route('MUT.store')}}"  method="post" id="regForm">
                  @csrf
                  <h1 id="register">Survey Form</h1>
                  <div class="all-steps" id="all-steps">
                    <span class="step"><i class="fa fa-user"></i></span>
                    <span class="step"><i class="fa fa-map-marker"></i></span>
                    <span class="step"><i class="fa fa-shopping-bag"></i></span>
                    <span class="step"><i class="fa fa-car"></i></span>
                    <span class="step"><i class="fa fa-spotify"></i></span>
                    <span class="step"><i class="fa fa-mobile-phone"></i></span>
                  </div>

                  <div class="tab">
                    <h6>budget</h6>
                      <span>
                        <input placeholder="Budget" oninput="this.className = ''" type="number" name="budget">
                        <progress id="myProgress" value="0" max="100">
                      </progress>
                      <input type="number" id="percent" placeholder="Enter Your percentage" name="percent" onkeyup="
                       var percent=   document.getElementById('percent');
                      console.log(percent.value);
                      var progress = document.getElementById('myProgress');
                      console.log(progress.value);
                       progress.value = parseInt(percent.value);
                             "> </span>
                  </div>
                  <div class="tab">
                    <h6>Date check_in</h6>
                      <span>
                        <input placeholder="" oninput="this.className = ''" type="date" name="check_in">
                      </span>

                      <h6>Date check_out</h6>
                      <span><input placeholder="City" oninput="this.className = ''" type="date" name="check_out"></span>

                  </div>
                 

                  <div class="tab">
                   
                        Type of it

                        <div class="container">
                          <div class='row'>
                            
                          
                         
                            <div class="col-4-lg">
                              <span> No Of Single Room<input placeholder="Number Of Rooms" oninput="this.className = ''" type="text" name="room_type[]" value='single' hidden></span>
                              <span><input placeholder="Number Of Rooms" oninput="this.className = ''" type="number" name="n_of_room[]" ></span>

                            </div>
                            <div class="col-4-lg">
                              <span> No Of Double Room<input placeholder="Number Of Rooms" oninput="this.className = ''" type="text" name="room_type[]" value='double' hidden></span>
                              <span><input placeholder="Number Of Rooms" oninput="this.className = ''" type="number" name="n_of_room[]"></span>

                            </div>
                           
                           <div class="col-4-lg">
                            <span> No Of Triple Room :<input placeholder="Number Of Rooms" oninput="this.className = ''" type="text" name="room_type[]" value='triple' hidden></span>
                            <span><input placeholder="Number Of Rooms" oninput="this.className = ''" type="number" name="n_of_room[]"></span>

                           </div>
                         </div>
                       </div>
                  </div>

                  <div class="tab">
                      <h6>Number of Adults</h6>
                        <span><input placeholder="Number of Adults" oninput="this.className = ''" type="number" name="n_of_adults"></span>

                        <h6>Number of Childeren</h6>
                        <span><input placeholder="Number of Childeren" oninput="this.className = ''" type="number" name="n_of_childeren"></span>

                    </div>


                  <div class="thanks-message text-center" id="text-message"> <img src="{{asset("./assets/imgs/confirm.png")}}" width="100" class="mb-4">
                      <h3>Thankyou for your Data is Saved!</h3> <span>click confirm to pay and continue you Special Trip!</span>
                      <button type="submit">confirm</button>
                  </div>
                  <div style="overflow:auto;" id="nextprevious">
                      <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right" ></i></button> </div>
                  </div>


              </form>
          </div>
      </div>
  </div>
      </div>
    </div>



    <script src="{{asset("./assets/Js/makeOrder.js")}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


</body>
</html>

