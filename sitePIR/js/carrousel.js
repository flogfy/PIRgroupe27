$(document).ready(function(){



var $carrousel = $('#carrousel_residence'),

    $img = $('#carrousel_residence img'),

    indexImg = $img.length - 1,

    i = 0,

    $currentImg = $img.eq(i);


$img.css('display', 'none');

$currentImg.css('display', 'block');





$('.next').click(function(){


    i++;


    if( i <= indexImg ){

        $img.css('display', 'none');

        $currentImg = $img.eq(i);

        $currentImg.css('display', 'block');

    }

    else{

        i = indexImg;

    }


});


$('.prev').click(function(){


    i--;


    if( i >= 0 ){

        $img.css('display', 'none');

        $currentImg = $img.eq(i);

        $currentImg.css('display', 'block');

    }

    else{

        i = 0;

    }


});


function slideImg(){

    setTimeout(function(){



        if(i < indexImg){

        i++;

    }

    else{

        i = 0;

    }


    $img.css('display', 'none');


    $currentImg = $img.eq(i);

    $currentImg.css('display', 'block');


    slideImg();


  }, 4000);

}


slideImg();


});
