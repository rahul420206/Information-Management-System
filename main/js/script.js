        $(document).ready(function() {
        $('#autoWidth,#autoWidth2').lightSlider({
            autoWidth:true,
            loop:true,
            onSliderLoad: function() {
                $('#autoWidth,#autoWidth2').removeClass('cS-hidden');
            } 
        });  
      });



        let filt = document.querySelectorAll('.filter');
        let burger = document.querySelector('.burger');
        let nav = document.querySelector('.nav');

           function myfun() {
           	filt.forEach(filter => filter.classList.remove('act'));
           	this.classList.add('act');
           }

        filt.forEach(filter => filter.addEventListener('click', myfun));

       
    
       burger.addEventListener('click', () =>{
        nav.classList.toggle('nb');
        burger.classList.toggle('sd');
       })

