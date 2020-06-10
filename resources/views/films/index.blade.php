@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row show">
            
        </div>
        <div class="show_link">
            <button class="prev-btn btn-light btn-outline-dark text-sm font-weight-bold">Prev Page</button>
            <button class="next-btn btn-light btn-outline-dark text-sm font-weight-bold">Next Page</button>
        </div>
    </div>

    
@endsection

@section('ajaxdata')
<script>

    $.ajaxSetup({
        headers: {'X-CSRF-Token': '{{csrf_token()}}'}
    });
    //   get data
    $(function(){
        var current_page = 1,
            per_page = 3,
            total = 0;

        fetchData();

        // prev btn
        $(".prev-btn").on('click',function(){
            if(current_page > 1){
                current_page--;
                fetchData();
            }
            console.log("Prev page: "+current_page);
            
        });
        // next btn
        $(".next-btn").on('click',function(){
            if(current_page * per_page < total){
                current_page++;
                fetchData();
            }
            console.log("Next page: "+current_page);
        });

        function fetchData(){
            // ajax
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/api/films?page='+current_page,
                // dataType: 'json',
                data:{
                    current_page: current_page,
                    per_page: per_page
                },
                headers : {
                    "Accept" : "application/json; charset=utf-8", 
                    "Content-Type" : "application/json; charset=utf-8"
                },
                success: function (data) {
                console.log(data);
                    
                    if(data){
                        total = data.meta.total; 

                        var dataArr = data.data;
                        var store = '';
                        for(var i=0; i<dataArr.length;i++){
                            // console.log(dataArr[i].href.link.split('/'));
                            var pathArray = dataArr[i].href.link;
                            var id = pathArray.substring(pathArray.lastIndexOf('/') + 1);

                            store += '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-4">'
                            store +=    '<div class="card">'
                            store +=        '<img src="'+dataArr[i].photo+'" class="card-img-top filmImageSize" alt="...">'
                            store +=        '<div class="card-body">'
                            store +=            '<p class="font-weight-bold">'+dataArr[i].name+'</p>'
                            store +=            '<div class="row">'
                            store +=                '<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">'
                            store +=                    '<p class="font-weight-bold"><small>Release: '+dataArr[i].release+'</small></p>'
                            store +=                '</div>'
                            store +=                '<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">'
                            store +=                    '<p class="font-weight-bold"><small>Rating: '+dataArr[i].rating+'</small></p>'
                            store +=                '</div>'
                            store +=            '</div>'
                            store +=            '<a href="/film/'+id+'" class="btn btn-light btn-outline-dark text-sm font-weight-bold float-right">view details</a>'
                            store +=        '</div>'
                            store +=    '</div>'
                            store +='</div>'
                        }
                         $(".show").html(store);
                    }
                
                   

                },error:function(){ 
                    console.log(data);
                }
            });
        }
    });


    
</script>
@endsection