@extends('/temp')

@section('tempStyle')
<link rel="stylesheet" href="{{asset("./assets/css/temp.css")}}" >
<link rel="stylesheet" href="{{asset("./assets/css/footer.css")}}" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

@endsection

{{-- __________________________________________________________________________ --}}


@section('footerStyle')
<a href="https://front.codes/" class="logo" target="_blank"><img src="https://assets.codepen.io/1462889/fcy.png" alt=""></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('./assets/Js/temp.js')}}"></script>
@endsection

{{-- ================================================================================================================================================== --}}