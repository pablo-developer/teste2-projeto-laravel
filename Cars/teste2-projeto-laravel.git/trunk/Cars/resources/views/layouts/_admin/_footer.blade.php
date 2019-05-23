        
    
 <style>
 


        /* Sticky footer position and size
        -------------------------------------------------- */
        html {
          position: relative;
          min-height: 100%;
        }
        body {
          /* Margin bottom by footer height */
          margin-bottom: 135px;
        }
        .footer {
          position: absolute;
          bottom: 0;
          width: 100%;
          /* Set the fixed height of the footer here */
          height: 135px;
        }
        
        /* Taller footer on small screens */
        @media (max-width: 34em) {
            body {
              margin-bottom: 500px;
            }
            .footer {
              height: 500px;
            }
        }
        
        /* Sticky footer style and color
        -------------------------------------------------- */
        footer {
          padding-top: 30px;
          background-color: #292c2f;
          color: #bbb;
        }
        
        footer a {
          color: #999;
          text-decoration:none;
        }
        
        footer a:hover, footer a:focus {
          color: #aaa;
          text-decoration:none;
          border-bottom:1px dotted #999;
        }
        
        footer .form-control {
            background-color: #1f2022;
            box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.1);
            border: none;
            resize: none;
            color: #d1d2d2;
            padding: 0.7em 1em;
        }                
                    </style>
         <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h5><i class="fa fa-road"></i> Sistema Administrativo</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li><a href="{{route('admin.principal')}}">Inicial</a></li>
                                    <li><a target="_blandk" href="{{route('site.home')}}">Site</a></li>                                    
                                </ul>
                            </div>                            
                        </div>                                               
                    </div>                    
                </div>
            </div>
        </footer>