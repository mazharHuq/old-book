<div class="container pb-4">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8 relative">
            <form >
                @csrf
            <div class="search "> <input type="text" id="searchInput" class="form-control" placeholder="What are you looking for?"> <button class="btn btn-warning"><i class="fa fa-search fa-lg"></i></button> </div>
            </form>
            <div class="rounded-2xl p-2 bg-white search-result" >
                <h5>Search Result For Books</h5>
                <ul id="searchResult">

                </ul>


            </div>
        </div>

    </div>
</div>

<style>
    .search-result{
        position: absolute;
        display: none;
        z-index: 1;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        top:3.8rem;
        border-radius: 5px;
        width:95%

    }
    .search-result>ul>li{
        display: flex;
        border-bottom: 1px solid black;
    }
    .search-result>ul>li>img{
        height: 60px;
        width: 60px;
        object-fit: cover;

    }
    .search2{
display: flex;
        flex-direction: column;
    }
</style>
<script>
    $(document).ready(function(){
        $("#searchInput").on('keyup',function(){
            var _token = $("input[name='_token']").val();
            var searchValue = this.value;


            var actionurl = "{{route('search')}}";
           if(this.value.length>0)
           {

               $('.search-result').show();

               $.ajax({
                   url: actionurl,
                   type:'POST',

                   data: {_token:_token, searchValue:searchValue},
                   success: function(data) {
                       console.log(data.success)
                       $('#searchResult').html('')
                       $('#searchResult').append(data.success)
                   }
               });

           }else
           {
               $('.search-result').hide();
           }


        });
    });

</script>
