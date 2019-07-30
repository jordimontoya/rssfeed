<!DOCTYPE html>
<html lang="">
  <head>    
    <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/css/main.min.css">
  </head>
  <body>
    <div class="app">
      <main class="app-main">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <h1 class="page-title"> RSS Feed </h1>
              </header>

              <div class="page-section">

                <!--<div class="section-block">
                  <p class="text-muted"> The base <code>.nav</code> component does not include any <code>.active</code> state. The following examples include the class, mainly to demonstrate that this particular class does not trigger any special styling. </p>
                </div>-->

                <div class="section-deck">
                  <section class="card card-fluid">
                    <header class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" data-toggle="tab" href="#feed1">IAG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#feed2">MEL</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#feed3">FACE</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#feed4">FB</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#feed5">TMUS</a>
                        </li>
                      </ul>
                    </header>
                    <div class="card-body">
                      <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active show" id="feed1">
                          <p></p>
                        </div>
                        <div class="tab-pane fade" id="feed2">
                          <p></p>
                        </div>
                        <div class="tab-pane fade" id="feed3">
                          <p></p>
                        </div>
                        <div class="tab-pane fade" id="feed4">
                          <p></p>
                        </div>
                        <div class="tab-pane fade" id="feed5">
                          <p></p>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
      
    <script src="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/lib/jquery.rss.min.js"></script>
    <script src="<?php echo 'http://'.$_SERVER["SERVER_NAME"]; ?>/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        
        $(function(){

            $('#feed1 p').rss(
                'https://news.google.com/rss/search?q=international+consolidated+airlines',{
                limit: 40,
                entryTemplate: '<li><a href="{url}" target="_blank">{title}</a></li>',
                success: function() {
                    $('.rss-feed ul li a').each(function() {
                        $(this).attr('data-search-term', $(this).text().toLowerCase());
                    });
                }
            });
            
            $('#feed2 p').rss(
                'https://news.google.com/rss/search?q=melia',{
                limit: 40,
                entryTemplate: '<li><a href="{url}" target="_blank">{title}</a></li>',
                success: function() {
                    $('.rss-feed ul li a').each(function() {
                        $(this).attr('data-search-term', $(this).text().toLowerCase());
                    });
                }
            });
            
            $('#feed3 p').rss(
                'https://news.google.com/rss/search?q=facephi',{
                limit: 40,
                entryTemplate: '<li><a href="{url}" target="_blank">{title}</a></li>',
                success: function() {
                    $('.rss-feed ul li a').each(function() {
                        $(this).attr('data-search-term', $(this).text().toLowerCase());
                    });
                }
            });
            
            $('#feed4 p').rss(
                'https://news.google.com/rss/search?q=facebook',{
                limit: 40,
                entryTemplate: '<li><a href="{url}" target="_blank">{title}</a></li>',
                success: function() {
                    $('.rss-feed ul li a').each(function() {
                        $(this).attr('data-search-term', $(this).text().toLowerCase());
                    });
                }
            });
            
            $('#feed5 p').rss(
                'https://news.google.com/rss/search?q=tmus',{
                limit: 40,
                entryTemplate: '<li><a href="{url}" target="_blank">{title}</a></li>',
                success: function() {
                    $('.rss-feed ul li a').each(function() {
                        $(this).attr('data-search-term', $(this).text().toLowerCase());
                    });
                }
            });

        });
        
    </script>
  </body>
</html>