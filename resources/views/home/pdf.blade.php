<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item</title>
</head>
<body>
    <div class="card-columns">
        @foreach ($items as $item) @foreach ($fragances as $fragance) @if ($item->getFragance_id() == $fragance->getId())
        <div class="card">
      
          <div class="card-body">
            <h5 class="card-title">
              {{ $fragance->getTitle() }}
            </h5>
          </div>
          <div class="card-footer">$ {{ $item->getsubTotal() }}</div>

            <p>{{$item->getQuantity()}}</p>
            
          
        </div>
      
        @endif @endforeach @endforeach
      </div>
      <br />
      <p class="btn btn-warning btn-block btn-lg">$ {{ $total }}</p>
</body>
</html>