
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
 var  x = document.getElementsByClassName("custom-logo-link");

 var i;



 if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
    document.getElementById("wrapper-navbar").style.background = "rgba(256,256,256,1)";
    
    for (i = 0; i < x.length; i++) {
      x[i].style.width = "100px";
      
    }
  } else {
   
   
    for (i = 0; i < x.length; i++) {
      x[i].style.width = "160px";

    } 
  }
}

//jQuery(document).on('ready',function($){
jQuery(function($){
   

    /* Dropdown menu script */

    $('ul.navbar-nav li.dropdown').hover(function() {
      
      $(this).find('.dropdown-menu').addClass("show");


    }, function() {
      $(this).find('.dropdown-menu').removeClass("show");
  });
  
  $('ul.navbar-nav li.dropdown button').on('click',function(e) {
    e.preventDefault();
    var par;
    par =  $(this).closest('li');
    //console.log ($(this).attr("aria-expanded"));
    
    if ($(this).attr("aria-expanded") == "true"){
    
        $(this).attr("aria-expanded","false");
        $(this).parents("li.dropdown").removeClass("show");
        $(this).parents("li.dropdown").find("ul.dropdown-menu").removeClass("show");
        


    }else{
      
        $(this).attr("aria-expanded","true");
        $(this).parents("li.dropdown").addClass("show");
        $(this).parents("li.dropdown").find("ul.dropdown-menu").addClass("show");
      
        //$(document).on('keyup',keyHandler);
    }
  });
     
     /* Logo Slider Script */

  $('.logo-slider').slick({

      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false,
      rtl: true,

      /*
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay: false,
      autoplaySpeed: 1500,
      centerMode: true,
      dots: false,
      //variableWidth: true,
      rtl: true /*,
      */
      responsive: [
        /*
        {
          breakpoint: 1600,
          settings: {
            slidesToShow: 6,
            slidesToScroll: 6,
            
            
          }
        },*/
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          
          
          }
        },
        {  
          
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            
            
          }
        },
        {  
          
          breakpoint: 960,
          settings: {
            slidesToShow: 2,
            slidesToScroll:1,
          
            
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }]
  });


  
  /**
   * 
   * activate testemonials slider:
   * 
   */
  
   $('.single-testem').slick({
        autoplay:false,
        dots: false,
        autoplaySpeed: 5000,
        speed: 500,
        fade: true,
        rtl: true
        
    });

  // set forms:
  /*
  $('.wpcf7 .field-wrap').each(
    function(e){

    
          $(this).on('focusin', function (e){
           
              $(this).find('.labeltxt').css('top', '0');
          }).on('focusout',function (e){
              var val =  $(this).find('input').val();

              if(!val){
                
              //}else{
                $(this).find('.labeltxt').css('top', '2.25rem');
              }

           } );
          
          
          
    }
  )*/
  

  /*
  $('#contactus .field-wrap').each(
    function(e){

    
          $(this).focusin( function (e){
           
              $(this).find('.labeltxt').css('top', '0');
          }).focusout(function (e){
              var val =  $(this).find('input').val();

              if(!val){
                
              //}else{
                $(this).find('.labeltxt').css('top', '2rem');
              }

           } );
          
          
          
    }
  )*/

  
  /*
    Handling Invalid field in forms.
  
var wpcf7Elm = document.querySelector( '.wpcf7' );

wpcf7Elm.addEventListener( 'wpcf7invalid',
   function(event) {
      setTimeout(onInvalidFormInput ,0, event );
  });*/

  $('.wpcf7' ).on( 'wpcf7invalid',function(event) {
          setTimeout(onInvalidFormInput ,0, event );
      });

  

  
  function onInvalidFormInput(event){
      
    //console.log( "event.detail.contactFormID=" + event.detail.contactFormId );

  
    var theForm = event.target;
    var formId =  $(theForm).parent().attr("id") ;

     /// screen-reader-response make visibble:
    $(theForm).parent().find('.screen-reader-response').addClass('screen-reader-response-show');
    $(theForm).parent().find('.screen-reader-response').attr('id',formId+"-sr-response");
    $(theForm).parent().find('.screen-reader-response').attr('tabindex','-1');

    
    $(theForm).find( 'input.wpcf7-not-valid' ).each(function( index ){//

       // console.log ("---------------------"+formId );

        var label = $(this).closest('label').find('.labeltxt').text();
        var id = $(this).attr("id");
        var name = $(this).attr("name");

      
        if (id == undefined){
          
          $(this).attr("id", name+"_"+index+"_"+formId );

          id = $(this).attr("id");
        }

       // console.log ("label="+label + " id="+id + "  name="+name );
        setUpInvlidListLink(formId, label, name, id); 
      }
     
    )
    
    //$(formId+"-sr-response").focus();
    $('#'+formId+"-sr-response").trigger('focus');
    //window.location.href = "#"+formId+"-sr-response";

  }



  function setUpInvlidListLink(formId, label,name,id){
  //  console.log('setUpInvlidListLink was called');
    var formId = formId;
    var label = label;
    var name = name;
    var id = id;

    label=  (label.substr(label.length-1,1 ) == "*") ? label.substring( 0 ,label.length-1 ): label; 

    $('#'+formId + ' .screen-reader-response li').each(

      function(index){
        //console.log( $(this).attr('id') + " "+ name);

        var nameLength = name.length;
        var thisId = $(this).attr('id');
        var txt;
        var link;

        //console.log (thisId.substring( thisId.length - nameLength, thisId.length ) );
        if( thisId.substring( thisId.length - nameLength, thisId.length )  == name  ){

          var link = $(this).find('a');
         // console.log("link="+ link.length);

          if (link.length){
           
            txt = label+ " "+ $(link).text()
            $(link).text(txt);

          }else{
            

            txt = label+ " "+ $(this).text();
            $(this).html ( '<a href="#'+id+'" >'+txt+'</a>'   );

          }

            

        }

      }

    )

  }


});
