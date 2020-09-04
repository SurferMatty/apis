$(document).ready(function(){

    // jQuery methods go here...
        /*if (window.jQuery) {  
            // jQuery is loaded  
            alert("Yeah!");
        } else {
            // jQuery is not loaded
            alert("Doesn't Work");
        }*/
        console.log("Loaded!");
        $("#geoButton").click(function(){
            $.ajax({
                url: "Resources/getInfo.php",
                type: "POST",
                dataType: "json",
                data: {
                    country: $('#country').val(),
                    lang: $('#language').val()
                },
                success: function(res) {

                    if (res.status.code == "200") {
                        console.log("!");
                        $('#continent').html(res['data'][0]['continent']);
                        $('#capital').html(res['data'][0]['capital']);
                        $('#languages').html(res['data'][0]['languages']);
                        $('#population').html(res['data'][0]['population']);
                        $('#area').html(res['data'][0]['areaInSqKm']);
                    } else {
                        console.log(res.status.code);
                    }
                },
                error: function(jqXHR, textStatus, error){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(error);
                }
            });
        });

        $("#weatherButton").click(function(){
            $.ajax({
                url: "Resources/getWeather.php",
                type: "POST",
                dataType: "json",
                data: {
                    city: $('#city').val()
                },
                success: function(res){
                    console.log(res)
                    $('#weather').html(res['data'][0]['description']);
                },
                error: function(jqXHR, textStatus, error){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(error);

                }
            })
        });
        
  }); 