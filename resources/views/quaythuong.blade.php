@extends('layouts.master')
@push('styles')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endpush

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endpush


@section('main')
   <div class="wrap">
       <div class="mycontainer">
           <div class="spinBtn"></div>
           <div class="wheel">
               @php
                   $i = 1;
               @endphp
               @foreach($pac->vouchers as $p)
                   <div class="number" style="--i:{{$i++}}">
                       <span>{{$p->giatri*100}}</span>
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
            fetch("{{route('getData',['userid'=>Auth::user()->id,'id'=>$pac->id])}}")
                .then((response) => response.json())
                .then(handledata)
                .catch((err) => {
                    console.error(err);
                });

        }

        function handledata(dt) {

            if (dt.data === "hết lượt quay")
            {
                noti_body.textContent = "vui lòng làm nhiệm vụ để có thêm lượt quay";
                Modal.style.display = "block";
                return;
            }


            console.log(dt);
            wheel.style.transition = 'transform 7s ease-in-out';

            let data = dt.data.id+1;

            let min = (45 / 2) + (data - 2 ) * 45;
            let max = (45 * (data-1)) + (45 / 2);

            let value = Math.floor(Math.random() * (max - min)) + min;
              value = value + 360 * Math.round(Math.random() * 10 + 2);

            console.log(min + ' ' + max + ' a ' +  data + ' ' + value);

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
                },1500)
            }, 7000)

        }

    </script>
@endsection

