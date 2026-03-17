<pre>
           login_page.html.twig          redirection_page.html.twig
         errorLoginPopup.html.twig      dialog_connections.html.twig
                    ↓↑                            ↓↑
                   JSON    JSON <------------------
                    ↓↑      ↓↑  ⬐------------------------------------------------------------------------------.
        DeleteConnectionController ====> DeleteConnectionChecker                                                |
                    ↓                            ↑       |                                                      |
        DeleteConnectionContextBuilder           |       '---------------------------.                          |
                    ↓                            |                                   ↓                          |
        DeleteConnectionFillerInterface          |                       DeleteConnectionInterface              |
             _______↓_______                     |                 __________________↓__________________        |
            ↓               ↓                    |                ↓                                     ↓       |
DeletePrevRegInFiller DeleteAllConnectionsFiller |      DeletePreviousRegService          DeleteAllConnections  |
            ↓               ↓                    |                |_____________________________________|       |
        DeleteConnectionContext -----------------'                          ↓                  ↓                |
                                                                        Connection      CleanConnectionDTO ----' 
</pre>
