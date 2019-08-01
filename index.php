<!DOCTYPE html>
<html lang="">
  <head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway);
        body{
          background: #efefef;  
        }
        .container{
          background-color:#fefefe;
          margin: 2% 5% 0 5%;
          padding: 2% 3% 3% 3%;
          box-shadow: 0.1em 0.2em 1.1em #666;
          border-radius: 1em;
          text-align: center;
        }
        .page-title-bar{
           margin: 2% 5% 0 5%;
        }
        .page-title{margin-top:0;font-size:1.75rem}
        .content p{
          text-align: left;
        }
        p,h1,h2{
          font-family: "Raleway";
        }
        
        /*
         CSS for the main interaction
        */
        .tabset > input[type="radio"] {
          position: absolute;
          left: -200vw;
        }

        .tabset .tab-panel {
          display: none;
        }

        .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
        .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
        .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
        .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
        .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
        .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
          display: block;
        }

        /*
         Styling
        */
        body {
          font: 14px/1.2em "Overpass", "Open Sans", Helvetica, sans-serif;
          color: #333;
          font-weight: 300;
        }

        .tabset > label {
          position: relative;
          display: inline-block;
          padding: 15px 15px 25px;
          border: 1px solid transparent;
          border-bottom: 0;
          cursor: pointer;
          font-weight: 600;
        }

        .tabset > label::after {
          content: "";
          position: absolute;
          left: 15px;
          bottom: 10px;
          width: 22px;
          height: 4px;
          background: #8d8d8d;
        }

        .tabset > label:hover,
        .tabset > input:focus + label {
          color: #06c;
        }

        .tabset > label:hover::after,
        .tabset > input:focus + label::after,
        .tabset > input:checked + label::after {
          background: #06c;
        }

        .tabset > input:checked + label {
          border-color: #ccc;
          border-bottom: 1px solid #fff;
          margin-bottom: -1px;
        }

        .tab-panel {
          padding: 30px 0;
          border-top: 1px solid #ccc;
        }

        .tabset {
          max-width: 65em;
        }
        
        
        /* ----------------  TIMELINE*/

        .timeline-item {
          padding: 3em 2em 1em;
          position: relative;
          color: rgba(0, 0, 0, 0.7);
          border-left: 2px solid rgba(0, 0, 0, 0.3);
        }
        
        .timeline-item h1 {
            text-align: left;
        }
        
        .timeline-item::before {
          content: attr(date-is);
          position: absolute;
          left: 2em;
          font-weight: bold;
          top: 1em;
          display: block;
        }
        .timeline-item::after {
          width: 10px;
          height: 10px;
          display: block;
          top: 1em;
          position: absolute;
          left: -7px;
          border-radius: 10px;
          content: '';
          border: 2px solid rgba(0, 0, 0, 0.3);
          background: white;
        }
        .timeline-item:last-child {
          -o-border-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 60%, rgba(0, 0, 0, 0)) 1 100%;
             border-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 60%, rgba(0, 0, 0, 0)) 1 100%;
        }
    </style>
  </head>
  <body>
     
     <header class="page-title-bar">
         <h1 class="page-title"> RSS Feed </h1>
     </header>
     
     <!-- RSS FEED -->
     <div class="container">
      <div class="content">
        <div class="tabset">
            
        </div>
      </div>
    </div>
      
    <script src="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/lib/jquery.rss.min.js"></script>
    
    <script>
        
        /*var ids = $(".tab-panel").map(function(){
            return this.id
        }).get();*/
        
        var keywords = ["FACEBOOK", "GOOLE", "APPLE"];
        
        $(function(){
            
            // Create tab
            $.each(keywords, function( index, keyword ) {

              if(index != 0){
                  $('.tabset').append(
                    '<input type="radio" name="tabset" id="tab'+index+'" aria-controls="'+keyword.toLowerCase()+'"><label for="tab'+index+'">'+keyword+'</label>'
                  );
              } else {
                  $('.tabset').append(
                    '<input type="radio" name="tabset" id="tab'+index+'" aria-controls="'+keyword.toLowerCase()+'" checked><label for="tab'+index+'">'+keyword+'</label>'
                  );
              }
            });
            
            // Create tab structure
            $('.tabset').append(
                '<div class="tab-panels"></div>'
            );
            
            // Create tab content
            $.each(keywords, function( index, keyword ) {
              $('.tab-panels').append(
                    '<div class="timeline-item" date-is="20-07-1990" id="'+keyword.toLowerCase()+'">'
              );
                
                var rss = rss(
                    'https://news.google.com/rss/search?q='+keyword.toLowerCase(),{
                    limit: 10,
                    entryTemplate: '<p>{body}</p>',
                    success: function() {
                        console.log(keyword);
                    }
                });
                $('.tab-panels').append(
                    '</div>'
              );
            
              /*$('#'+keyword.toLowerCase()).rss(
                    'https://news.google.com/rss/search?q='+keyword.toLowerCase(),{
                    limit: 10,
                    entryTemplate: '<p>{body}</p>',
                    success: function() {
                        console.log(keyword);
                    }
                });
                $('.tab-panels').append(
                    '</div>'
              );*/
            });
            
            /*
            <section id="'+keyword.toLowerCase()+'" class="tab-panel"><p></p></section>
            
            
            <div class="timeline-item" date-is='20-07-1990'>
                <h1>Hello, 'Im a single div responsive timeline without mediaQueries!</h1>
                <p>
                    I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.
                </p>
                <h1>Hello, 'Im a single div responsive timeline without mediaQueries!</h1>
                <p>
                    I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.
                </p>
            </div>

            <div class="timeline-item" date-is='20-07-1990'>
                <h1>Oeehhh, that's awesome.. Me too!</h1>
                <p>
                    I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.
                </p>
            </div>

            <div class="timeline-item" date-is='20-07-1990'>
                <h1>I'm ::last-child so my border fades ^__^</h1>
                <p>
                    I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.
                </p>
            </div>*/
        });
        
    </script>
  </body>
</html>