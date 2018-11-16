<div class="full-width">
    <div class="col-md-1"></div>
    <div class="col-md-10 col-sm-12">
        <div class="home-search margin-bottom-60">
            <form action="{{url('/search')}}" method="get" role="search">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Product Name, Category, Tag" name="q">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <div class="input-group-btn">
                        <button class="butn btn-default" type="submit" value="search">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>