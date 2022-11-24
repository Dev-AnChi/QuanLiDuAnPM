@extends('layouts.master')
@push('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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



   <!-- Modal -->
   <div class="modal fade show"  id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body" id="exampleModal-body">
                   ...
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-primary" id="Ok">OK</button>
               </div>
           </div>
       </div>
   </div>

    <script>
        let wheel = document.querySelector('.wheel');
        let noti_body = document.querySelector('#exampleModal-body');
        let Modal = document.querySelector('#exampleModal');
        let ok = document.querySelector('#Ok');
        let spinBtn = document.querySelector('.spinBtn');

        spinBtn.addEventListener('click', handleWheel)
        ok.addEventListener('click',()=> Modal.style.display = "none" );

        function handleWheel()
        {
            fetch("{{route('getData',['userid'=>Auth::user()->id,'id'=>1])}}")
                .then((response) => response.json())
                .then(handledata);
        }

        function handledata(dt) {

            if (dt.data == "hết lượt quay")
            {
                noti_body.textContent = "vui lòng làm nhiệm vụ để có thêm lượt quay";

                return;
            }


            console.log(dt);
            wheel.style.transition = 'transform 7s ease-in-out';
            data = dt.data.id[0];

            let min = (45 / 2) + (data - 2 ) * 45;
            let max = (45 * (data-1)) + (45 / 2);

            let value = Math.floor(Math.random() * (max - min)) + min;
            value = value + 360 * Math.round(Math.random() * 10)+3;

            console.log(min + ' ' + max + ' a ' + value);

            wheel.style.transform = "rotate(-" + value + "deg)";
            let fotmatData = value % 360;
            setTimeout(() => {
                // let temp = Math.ceil((fotmatData + (45 / 2)) / 45) === 9 ? 1 : Math.ceil((fotmatData + (45 / 2)) / 45);
                noti_body.textContent = "bạn đã trúng " + " " + dt.data.name +' bạn dợi 1 chút để vòng quay reset lại';
                setTimeout(()=>
                {
                    wheel.style.transition = "transform 0.5s ease-in-out";
                    wheel.style.transform = "none";
                    Modal.style.display = "block";
                },1000)
            }, 7000)

        }

    </script>
@endsection

