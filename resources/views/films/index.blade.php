@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row show">
            
        </div>
        <div class="show_link">

        </div>
    </div>

    
@endsection

@section('ajaxdata')
<script>

    $.ajaxSetup({
        headers: {'X-CSRF-Token': '{{csrf_token()}}'}
    });
    //   get data
    function getRecords(){
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: 'api/films',
            dataType: 'json',
            headers : {
                "Accept" : "application/json; charset=utf-8", 
                "Content-Type" : "application/json; charset=utf-8"
            },
            data:{ 
                _token:'{{ csrf_token() }}'
            },
            success: function (response) {
                console.log(response);
                
                // console.log(response.data[0].name);
            var resultData = response.data;
            var store = '';
            $.each(resultData,function(index,row){
                store += '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-4">'
                store += '<div class="card">'
                store += '<img src="'+row.photo+'" class="card-img-top filmImageSize" alt="...">'
                store += '<div class="card-body">'
                store += '<p class="font-weight-bold">'+row.name+'</p>'
                store += '<a href="#" class="btn btn-light btn-outline-dark text-sm font-weight-bold">view details</a>'
                store += '</div>'
                store += '</div>'
                store += '</div>';
            });
            $(".show").html(store);
                
            },error:function(){ 
                console.log(response);
            }
        });
    }
    getRecords();
</script>
@endsection