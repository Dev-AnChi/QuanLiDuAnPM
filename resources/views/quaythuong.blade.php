@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endpush

@section('main')
   <div class="wrap">
       <div class="container">
           <div class="spinBtn"></div>
           <div class="wheel">
               @php
                   $i = 1;
               @endphp
               @foreach($pac as $p)
                   <div class="number" style="--i:{{$i++}}">
                       <span>{{$p->giatri*10}}</span>
                   </div>
               @endforeach
           </div>
       </div>
   </div>

    <script>
        let wheel = document.querySelector('.wheel');
        let spinBtn = document.querySelector('.spinBtn');

        spinBtn.addEventListener('click', handleWheel)


        function handleWheel()
        {
            fetch("{{route('getData',['id'=>1])}}")
                .then((response) => response.json())
                .then(handledata);

        }


        function handledata(dt) {

            console.log(dt.data[0]);
            data = dt.data[0];

            let min = (45 / 2) + (data - 2 ) * 45;
            let max = (45 * (data-1)) + (45 / 2);

            let value = Math.floor(Math.random() * (max - min)) + min;
            value = value + 360 * Math.round(Math.random() * 10)+3;

            console.log(min + ' ' + max + ' a ' + value);

            wheel.style.transform = "rotate(-" + value + "deg)";
            let fotmatData = value % 360;
            setTimeout(() => {
                let temp = Math.ceil((fotmatData + (45 / 2)) / 45) === 9 ? 1 : Math.ceil((fotmatData + (45 / 2)) / 45);
                alert("bạn đã trúng " + fotmatData + " " + temp);
            }, 7000)

        }

    </script>
@endsection

