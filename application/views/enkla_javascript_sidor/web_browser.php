<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Webbläsare.
-->
<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li><a href="<?php echo site_url('enkla_javascript_sidor/sorted_array'); ?>">Sortera array</a></li>
         <li><a href="<?php echo site_url('enkla_javascript_sidor/email_us'); ?>">Kontakta oss</a></li>
         <li class="active"><a href="<?php echo site_url('enkla_javascript_sidor/web_browser'); ?>">Identifiera webbläsare</a></li>
      </ul>
   </div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Identifiera webbläsare</h1>
         <br /><br />
         <div class="jumbotron">
            <h3>Kontrollera vilken webbläsare och version du använder genom att trycka på knappen nedan.</h3>
            <br /><br />
            <p><a class="btn btn-primary btn-lg" role="button" onclick="browser_text()">Webbläsare</a></p>
         </div>
         <div class="row col-md-12">
            <p id="browser"></p>
            <script>
            /**
            * Lägger till en länk.
            *
            * @param {string} Webläsaren.
            * @link http://stackoverflow.com/questions/4772774/how-do-i-create-a-link-using-javascript
            */
            function append_browser_link( p_browser ){
                var link = get_browser_link( p_browser ); //Hämtar länken
                var a = document.createElement('a');
                var linkText = document.createTextNode( link );

                a.appendChild(linkText);
                a.title = link;
                a.href = link;

                document.getElementById("browser").appendChild(a); //Lägger till
             }

            /**
            * Identifierar en webbläsare med namn och versionsnummer.
            *
            * @link http://stackoverflow.com/questions/5916900/how-can-you-detect-the-version-of-a-browser
            */
            function get_browser_info(){
                var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
                if(/trident/i.test(M[1])){
                    tem=/\brv[ :]+(\d+)/g.exec(ua) || []; 
                    return {name:'IE ',version:(tem[1]||'')};
                    }   
                if(M[1]==='Chrome'){
                    tem=ua.match(/\bOPR\/(\d+)/)
                    if(tem!=null)   {return {name:'Opera', version:tem[1]};}
                    }   
                M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
                if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
                return {
                    name: M[0],
                    version: M[1]
                };
             }

            /**
            * Information till en viss webbläsare.
            *
            * @param {string} Webläsaren.
            * @return En länk
            */
            function get_browser_link( p_browser ){
                var link;

                switch( p_browser ) {
                case "Chrome":
                    link = "http://sv.wikipedia.org/wiki/Google_Chrome";
                    break;
                case "Firefox":
                    link = "http://sv.wikipedia.org/wiki/Mozilla_Firefox";
                    break;
                default:
                    link = "Hittade inte länk!";
                    break;
                }

                return link;
            }

            /**
            * Skriver ut information om användarens webbläsare
            * och en länk till mer information.
            */
            function browser_text() {
                var browser=get_browser_info(); //Webbläsar info

                message = "<b>Webbläsare: </b>"  + browser.name + " <b>Version: </b>" + browser.version;
                message += "<br /><br />";
                message += "<b>Mer information: </b><br />";

            	document.getElementById("browser").innerHTML = message; //Skriver ut info
            	append_browser_link( browser.name ); //Skriver ut länk
            }
            </script>
         </div>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>