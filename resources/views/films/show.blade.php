@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row show">
            
        </div>
    </div>
@endsection

@section('ajaxdata')
    <script>
         $.ajaxSetup({
            headers: {'X-CSRF-Token': '{{csrf_token()}}'}
        });
        var getId = {{$id}};
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: '/api/films/'+getId,
            dataType: 'json',
            headers : {
                "Accept" : "application/json; charset=utf-8", 
                "Content-Type" : "application/json; charset=utf-8"
            },
            success: function (data) {
                var getData = data.data;
                var store ='';
                store += '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">'
                store +=     '<img src="https://picsum.photos/seed/picsum/200/300" class="card-img-top filmImageSize" alt="...">'
                store += '</div>'
                store += '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2 mb-4">'
                store +=     '<p class="font-weight-bold">Film Name: '+getData.name+'</p>'
                store +=     '<p class="font-weight-bold">Description: <small>'+getData.description+'</small></p>'
                store +=     '<p class="font-weight-bold">Release: '+getData.release+'</p>'
                store +=     '<p class="font-weight-bold">Date: '+getData.date+'</p>'
                store +=     '<p class="font-weight-bold">Rating: '+getData.rating+'</p>'
                store +=     '<p class="font-weight-bold">Ticket: '+getData.ticket+'</p>'
                store +=     '<p class="font-weight-bold">Price: '+getData.price+'</p>'
                store +=     '<p class="font-weight-bold">Country: '+getData.country+'</p>'
                store += '</div>'  

                $(".show").html(store);
            },error:function(){ 
                console.log(data);
            }
        });
    </script>
@endsection