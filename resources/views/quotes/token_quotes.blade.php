@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
       
        

    </div>
    {{-- <p>{{$token}}</p> --}}
        <div class="row justify-content-center mt-4">
            <table class="table table-striped">
                <thead>
                    <th>Number</th>
                    <th>Quotes</th>
                </thead>
                <tbody id="quotes">

                </tbody>
            </table>
        </div>
        <div class="row justify-content-center mt-4">
            <button class="btn btn-primary" id="logout_btn" name="refresh_btn">{{__('Log Out')}}</button>
        </div>
    
</div>

@section('script')
    
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
     var authUsers = JSON.parse(localStorage.getItem("authUser")); 
    $(document).ready(function () {
       
            fetch_five_quotes();
        
    });
    function fetch_five_quotes(){
            var number = 1;
            if(authUsers == null){
                alert('unauthorized');
                return false;
            }
            var url="http://127.0.0.1:8000/api/quotes_list";
            $('#quotes').html('');
            $.ajax({
            type: "get",
            cors: true ,
          contentType:'application/json',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Access-Control-Allow-Origin': '*',

                    "Authorization": "Bearer " + authUsers.token,

                },
            url: url,
            success: function (data) {
                console.log(data.quotes);
                
                $.each(data.quotes, function (key, value) { 
                            $('#quotes').append(
                                "<tr>\
                                    <td>" +number+++"</td>\
                                    <td>" +value+"</td>\
                                    </tr>"
                            );
                        });
            },
            error:function(){
                alert('Unathorize');
            }
        });
        }
        $(document).on('click','#logout_btn',function(){
            localStorage.removeItem("authUser");
            location.href='/';
        })
</script>
@endsection