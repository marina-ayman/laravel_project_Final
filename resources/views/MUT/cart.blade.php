{{dd($order)}}




<form action="{{route('payForMUTE',['order'=>$order])}}">

    <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
    <button type="submit">Finish My trip ^^ </button>
</form>
