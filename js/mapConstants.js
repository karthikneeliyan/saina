var map_constants = {
    get_co_ordinates: function(){
        return {lat:this.lat,lng:this.lng};
    },
    set_co_ordinates:function(lttitude,longitude)
    {
       this.lat=lttitude;
       this.lng=longitude;
    }
}