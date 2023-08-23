@extends('layouts.app')
@include('layouts.nav')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Mail Id</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($user_data))
                @foreach($user_data as $user)
                    <tr>
                    <!-- <th scope="row">1</th> -->
                    <td style="display:none">$user->id</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <!-- <td>{{$user->is_verified}}</td> -->
                    <td> 
                     <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}> 
                  </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
</table>
    </div>
</div>
<script>
   $(function() { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           $('.toggle-class').change(function() { 
           var status = $(this).prop('checked') == true ? 1 : 0;  
           var user_id = $(this).data('id');  
          
           $.ajax({     
               type: "POST", 
               dataType: "json", 
               url: '{{route('update.status')}}',  
               data: {'status': status, 'user_id': user_id}, 
               success: function(data){ 
               console.log(data.success) 
               $('.success-msg').html(data.success).fadeOut(3000);
            } 
         }); 
      }) 
   }); 
</script>
@endsection
