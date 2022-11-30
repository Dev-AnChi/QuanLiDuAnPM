@extends('layouts/admin')

@section('mainadmin')


   <div class="mt-4">
       <a class="btn btn-primary" href="{{route('user.create')}}">Them user</a>
       <table class="mt-4 table table-hover">
           <thead>
           <tr>
               <th scope="col">name</th>
               <th scope="col">email</th>
               <th scope="col">password</th>
               <th scope="col">soluotquay</th>
               <th scope="col">    </th>
           </tr>
           </thead>
            <tbody>

            @foreach ($users as $item)
                <tr>
                    <td >{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->password }}</td>
                    <td>{{ $item->soluotquay }}</td>
                    <td><a href="{{route('user.edit',['user'=>$item->id])}}">
                            <button type="submit">🔍</button>
                        </a></td>
                    <td>
                        <form action="{{route('user.destroy',['user'=>$item->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">❌</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

       </table>
   </div>



@endsection