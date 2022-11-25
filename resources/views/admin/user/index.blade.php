@extends('layouts/admin')

@section('mainadmin')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}

        tr:hover {background-color: coral;}
        td{
            text-align: center;
            line-height: normal;
        }
    </style>

   <div class="mt-4">
       <a class="btn btn-primary" href="user/create">Them user</a>
       <table class="mt-4">
           <tr>
               <th>name</th>
               <th>email</th>
               <th>password</th>
               <th>soluotquay</th>
               <th>    </th>
           </tr>
           @foreach ($users as $item)
               <tr>
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->email }}</td>
                   <td>{{ $item->password }}</td>
                   <td>{{ $item->soluotquay }}</td>
                   <td><a href="user/edit/{{ $item->id }}">
                           <button type="submit">🔍</button>
                       </a></td>
                   <td>
                       <form action="user/destroy/{{ $item->id }}" method="post">
                           @csrf
                           @method('delete')
                           <button type="submit">❌</button>
                       </form>
                   </td>
               </tr>
           @endforeach
       </table>
   </div>

@endsection