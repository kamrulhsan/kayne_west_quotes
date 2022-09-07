@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <button class="btn btn-primary mr-4" id="refresh_btn" name="refresh_btn"><i class="fas fa-sync-alt"></i> {{__('Refresh')}}</button>

        <button class="btn btn-primary ml-4" id="withToken" name="refresh_btn"><i class="fas fa-sync-alt"></i> {{__('Quotes With Token')}}</button>
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
    $(document).ready(function () {
        
        fetch_five_quotes();
        
        

        $(document).on('click','#refresh_btn',function(){
            fetch_five_quotes();
        })
        
    });
    function fetch_five_quotes(){
            var number = 1;
            $('#quotes').html('');
            $.ajax({
            type: "get",
            url: "/quotes_list",
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
            }
        });
        }
        $(document).on('click','#logout_btn',function(){
            localStorage.removeItem("authUser");
            location.href='/';
        })
        $(document).on('click','#withToken',function(){
            
            location.href='/quotes_list_with_token';
        })
</script>
@endsection