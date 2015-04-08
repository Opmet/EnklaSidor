<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Visar en array med tio slump tal mellan 1-100
-->
<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li class="active"><a href="<?php echo site_url('enkla_javascript_sidor/sorted_array'); ?>">Sortera array</a></li>
         <li><a href="<?php echo site_url('enkla_javascript_sidor/email_us'); ?>">Kontakta oss</a></li>
         <li><a href="<?php echo site_url('enkla_javascript_sidor/index'); ?>">Vilken webbläsare</a></li>
      </ul>
   </div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Sortera array</h1>
         <br /><br />
         <div >
            <b>Osorterad array:</b> <span id="unsorted"></span>
            <br /><br />
            <b>Sorterad array:</b>  <span id="sorted"></span>
            <br /><br />
            
            <script type="text/javascript">
            var container = []; //Behållare

            /**
        	* En array med tio slump tal mellan 1-100 skrivs ut.
        	*/
            function createUnsortedArray() {
                	  var array = [];
                      var length = 10;

                      //Fyll arrayn
                      for(i=0; i < length; i++)
                          {
                             array[i] = Math.floor((Math.random() * 100) + 1); //tio heltal, mellan 1-100.
                          }

                      container = array.slice();

                      $("#unsorted").text( array.toString() ); //Skriver ut array
                  }

            /**
        	* Sorterar och skriver ut en array med antingen stigande eller fallande ordning.
        	*/
            function sortArray() {
            	var array = container.slice();

            	//Kontrollerar vilken radioknapp som är intryckt.
            	if(document.getElementById('ascending').checked) {
            		//Skriver ut array med stigande ordning.
            		$("#sorted").text( array.sort(function(a, b){return a-b}).toString() );	
        		}
        		else if(document.getElementById('descending').checked) {
            		//Skriver ut array med fallande ordning.
        			$("#sorted").text( array.sort(function(a, b){return b-a}).toString() );
        		}

               return 1;
            }
           
            createUnsortedArray(); //Starta metod.

            </script>
            
            <input type="radio" id="ascending" name="sort" checked> Stigande ordning
            <input type="radio" id="descending" name="sort"> Fallande ordning
            
            <br /><br />
            
            <button type="button" onclick="sortArray()" class="btn btn-primary">
               <span class="glyphicon glyphicon-sort"></span> Sortera
            </button>
         </div>
         <div class="row col-md-12">
         </div>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>