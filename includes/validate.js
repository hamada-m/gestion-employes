$(document).ready(function(){
    $('#submit').on('click',function(e){
        var nom = $('#nom');
        var prenom = $('#prenom');
        var sal = $('#sal');
        var mat = $('#mat');
        var dept = $('#dept');
        var city = $('#city');
        var adress = $('#adress');
        var fields = [nom,prenom,mat,sal,dept,adress,city];
        for(var i=0;i<fields.length;i++){
           if(fields[i].val() == ""){
              e.preventDefault();
              fields[i].addClass("error");
           }
        }
    });
    $('#searchSubmit').on('click',function(e){
        var nom = $('#search');
        if(nom.val() == ""){
            e.preventDefault();
            nom.addClass("error");
        }
    });
});
